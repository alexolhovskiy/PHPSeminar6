<?php

namespace App\Models;

class GetUsers{
    private string $servername = "localhost";
    private string $username = "root";    // Логин по умолчанию в MAMP
    private string $password = "root";    // Пароль по умолчанию в MAMP
    private string $dbname = "test"; // Имя вашей базы данных

    public function getAll(){
        // Создаем соединение
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname, 3306);

        // Проверяем соединение
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return "Connection failed: " . $conn->connect_error;
        }
        // echo 
        // return "Connected successfully";

        // Пример запроса
        $sql = "SELECT * FROM users"; // Замените на имя вашей таблицы
        $result = $conn->query($sql);

        $arr=[];
        if ($result->num_rows > 0) {
            // Вывод данных каждой строки
            while($row = $result->fetch_assoc()) {
                $arr[]=$row;
                // echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
            }
            $conn->close();
            return $arr;
        } else {
            $conn->close();
            return false;
        }
    }
}
