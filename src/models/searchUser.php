<?php


namespace App\Models;

class SearchUser{
    // private string $address='file.txt';

    // public function search($dataString){
    //     if(file_exists($this->address)&&is_readable($this->address)){
    //         $file = fopen($this->address, 'r');
            
    //         while(!feof($file)){
    //             $data = fgets($file);
                
    //             $arr=explode(", ",trim($data));
    
    //             if(count($arr)>1){
    //                 if(trim($arr[0])==$dataString|| trim($arr[1])==$dataString){
    //                     return ['status'=>true,'data'=>['name'=>$arr[0],'date'=>$arr[1]]];
    //                 }
    //             }
    //         }
    //         fclose($file);
    //     }
    //     return ['status'=>false,'data'=>[]];
    // }    
    private string $servername = "localhost";
    private string $username = "root";    // Логин по умолчанию в MAMP
    private string $password = "root";    // Пароль по умолчанию в MAMP
    private string $dbname = "test"; // Имя вашей базы данных


    public function search($dataString){

        $db = new \mysqli($this->servername, $this->username, $this->password, $this->dbname, 3306);

        // Проверяем соединение
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
            return "Connection failed: " . $db->connect_error;
        }
        $stmt = $db->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->bind_param("s", $dataString);
        $stmt->execute();
        $result=$stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $db->close();
            return ['status'=>true,'data'=>$row];
        } else {
            $db->close();
            return ['status'=>false,'data'=>[]];
        }
    }    
}

