<?php

use App\Controllers\StudentController;
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function () {
    return "trang chủ";
});
$router->get('list-student', [StudentController::class, 'getStudent']);
$router->get('add-student', [StudentController::class, 'addStudent']);
$router->post('post-student', [StudentController::class, 'postStudent']);
$router->get('edit-student/{id}', [StudentController::class, 'editStudent']);
$router->post('edit-post/{id}', [StudentController::class, 'postEdit']);
$router->get('delete-student/{id}', [StudentController::class, 'deleteStudent']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
