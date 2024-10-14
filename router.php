<?php

// use App\Controller\Controller;

// if (strpos($_SERVER['REQUEST_URI'], '/') === 0){
//     include 'public/index.php';
// }elseif (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER['REQUEST_URI'])) {
//     return false; // Пусть сервер самостоятельно обработает этот запрос
// }else {
//     http_response_code(404);
//     echo json_encode(['error' => 'Route not found']);
// }


if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|html)$/', $_SERVER['REQUEST_URI'])) {
    return false;  // отдавать статические файлы напрямую
} else {
    // Рендерим главный файл index.html
    require __DIR__ . '/public/index.php';
}