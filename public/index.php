<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Controller\Controller;

require_once (__DIR__.'/../vendor/autoload.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Если пользователь заходит на корневой путь
    if (trim(str_replace('/','', $_SERVER['REQUEST_URI'])) === '') {
        // Рендерим представление (React будет загружен)
        require 'index.html';
        exit();
    }
    
    switch(strtok(str_replace('/app','',$_SERVER['REQUEST_URI']),'?')){
        case '/add':
            $controller=new Controller();
            echo json_encode($controller->adding($_GET['name'],$_GET['date']));
            break;
        case '/search':
            $controller=new Controller();
            echo json_encode($controller->searching($_GET['data']));
            break;
        case '/delete':
            $controller=new Controller();
            echo json_encode($controller->deleting($_GET['name'],$_GET['date']));
            break;
        case '/time':
            $controller=new Controller();
            echo json_encode($controller->currentTime());
            break;
        default:echo "No match for URI: " . $_SERVER['REQUEST_URI'];
    } 
} else {
    echo "Not a GET request";
}