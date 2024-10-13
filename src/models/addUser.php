<?php
namespace App\Models;

class AddUser{
    private string $address = 'file.txt';

    public function print($name,$date){
        echo "Call print";
        return "AddUser ".$name.",".$date;
    }

    public function writeToFile($name,$date){
        if($this->validate($date)){
            $data = $name . ", " . $date. "\r\n";
            $fileHandler = fopen($this->address, 'a');   
            if(fwrite($fileHandler, $data)){
                return "yes";
            }
            else {
                return "Произошла ошибка записи. Данные не сохранены";
            }
            fclose($fileHandler);
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