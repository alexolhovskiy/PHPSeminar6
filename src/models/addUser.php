<?php
namespace App\Models;

class AddUser{
    // private string $address = 'file.txt';

    private string $servername = "localhost";
    private string $username = "root";    // Логин по умолчанию в MAMP
    private string $password = "root";    // Пароль по умолчанию в MAMP
    private string $dbname = "test"; // Имя вашей базы данных

    public function print($name,$date){
        echo "Call print";
        return "AddUser ".$name.",".$date;
    }

    public function writeToFile($name,$date){
        if($this->validate($date)){
            // $data = $name . ", " . $date. "\r\n";
            // $fileHandler = fopen($this->address, 'a');   
            // if(fwrite($fileHandler, $data)){
            //     return "yes";
            // }
            // else {
            //     return "Произошла ошибка записи. Данные не сохранены";
            // }
            // fclose($fileHandler);

            $db = new \mysqli($this->servername, $this->username, $this->password, $this->dbname, 3306);

            // Проверяем соединение
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
                return "Connection failed: " . $db->connect_error;
            }

            $stmt = $db->prepare("INSERT INTO users (name, date) VALUES (?,?)");
            $stmt->bind_param("ss", $name, $date);
            $stmt->execute();
            $db->close();
            return 'yes';
        }
        else{
            return "Введена некорректная информация";
        }
    }

    public function validate(string $date): bool {
        $dateBlocks = explode("-", $date);
        if(count($dateBlocks)==3){
            if(checkdate((int)$dateBlocks[1],(int)$dateBlocks[0],(int)$dateBlocks[2])){
                return true;
            }
        }
        return false;
    }
}