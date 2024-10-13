<?php

namespace App\Controller;
use App\Models\AddUser;
use App\Models\SearchUser;
use App\Models\DeleteUser;
use App\Models\Timer;

class Controller{

    public function print(){
        echo "Controller";
    }

    public function adding($name,$date){
        $adder=new AddUser();
        return $adder->writeToFile($name,$date);
        // return $adder->print($name,$date);
    }
    public function searching($data){
        $searcher=new SearchUser();
        return $searcher->search($data);
        // return $adder->print($name,$date);
    }
    public function deleting($name,$date){
        $deleter=new DeleteUser();
        return $deleter->delete($name,$date);
        // return $adder->print($name,$date);
    }
    public function currentTime(){
        $timer=new Timer();
        return $timer->getTime();
    }
    public function index() {
        // Рендерим представление (React будет загружен)
        require '../src/views/index.html';
    }

}