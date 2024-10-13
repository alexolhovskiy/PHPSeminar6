<?php


namespace App\Models;

class DeleteUser{
    private string $address='file.txt';
    
    public function delete($name,$date){
        $dataString = $name . ", " . $date;

        if(file_exists($this->address)&&is_readable($this->address)){
            $file = fopen($this->address, 'r');
            while(!feof($file)){
                $data = fgets($file);
                if(trim($data)!==$dataString){
                    $res[]=$data;  
                }
            }
            fclose($file);
            $file = fopen($this->address, 'w');
            if ($file === false) {
                return "Не удалось открыть файл для записи: $this->address";
            }
            foreach ($res as $line) {
                if(trim($line)!==''){
                    fwrite($file, $line); // Записываем строку
                }
                
            }
            fclose($file);
        }
        return "done";
    }
}
