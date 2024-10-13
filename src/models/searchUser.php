<?php


namespace App\Models;

class SearchUser{
    private string $address='file.txt';

    public function search($dataString){
        if(file_exists($this->address)&&is_readable($this->address)){
            $file = fopen($this->address, 'r');
            
            while(!feof($file)){
                $data = fgets($file);
                
                $arr=explode(", ",trim($data));
    
                if(count($arr)>1){
                    if(trim($arr[0])==$dataString|| trim($arr[1])==$dataString){
                        return ['status'=>true,'data'=>['name'=>$arr[0],'date'=>$arr[1]]];
                    }
                }
            }
            fclose($file);
        }
        return ['status'=>false,'data'=>[]];
    }    
}

