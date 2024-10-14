<?php


namespace App\Models;

class DeleteUser{
    // private string $address='file.txt';
    
    // public function delete($name,$date){
    //     $dataString = $name . ", " . $date;

    //     if(file_exists($this->address)&&is_readable($this->address)){
    //         $file = fopen($this->address, 'r');
    //         while(!feof($file)){
    //             $data = fgets($file);
    //             if(trim($data)!==$dataString){
    //                 $res[]=$data;  
    //             }
    //         }
    //         fclose($file);
    //         $file = fopen($this->address, 'w');
    //         if ($file === false) {
    //             return "Не удалось открыть файл для записи: $this->address";
    //         }
    //         foreach ($res as $line) {
    //             if(trim($line)!==''){
    //                 fwrite($file, $line); // Записываем строку
    //             }
                
    //         }
    //         fclose($file);
    //     }
    //     return "done";
    // }
    private string $servername = "localhost";
    private string $username = "root";    // Логин по умолчанию в MAMP
    private string $password = "root";    // Пароль по умолчанию в MAMP
    private string $dbname = "test"; // Имя вашей базы данных

    public function delete($name,$date){
        
        $db = new \mysqli($this->servername, $this->username, $this->password, $this->dbname, 3306);

        // Проверяем соединение
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
            return "Connection failed: " . $db->connect_error;
        }
        $stmt = $db->prepare("DELETE FROM users WHERE name = ? AND date=?");
        $stmt->bind_param("ss", $name,$date);
        $stmt->execute();
        $db->close();
        return 'done';
    }    
}
