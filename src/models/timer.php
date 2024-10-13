<?php

namespace App\Models;


class Timer{
    public function getTime(){
        date_default_timezone_set('Europe/Moscow');
        return ['time' => date('H:i:s')];
    
    }
}