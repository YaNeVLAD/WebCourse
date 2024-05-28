<?php
require_once __DIR__ . '/../databaseFunctions.php';
require_once 'registerFunctions.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Origin: localhost');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    die();
}

header('Access-Control-Allow-Credentials: true');

//Регистрация
if ($method === 'POST') {

    $dataAsJson = file_get_contents("php://input");
    $dataAsArray = json_decode($dataAsJson, true);

    try {
        $database = createDBConnection();
        
        if ($id = registerUser($database, $dataAsArray)) {
            session_name('auth');
            session_start();
            $_SESSION['id'] = $id;
        }
    } catch (Exception $e) {
        $data = ['status' => $e->getMessage()];
        header('Content-Type: application/json', true, 401);
        echo json_encode($data);
    }

    closeDBConnection($database);
}