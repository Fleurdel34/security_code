<?php

require_once 'csrf.php';

header('Content-Type: application/json');

// qui est contacté? '/api/registrer'
$request = $_SERVER['REQUEST_URI'];

//pour quel motif? PUT,POST,GET, DELETE
$method = $_SERVER['REQUEST_METHOD'];

switch ($request){
    case '/api/login':
    case '/api/register':
        checkCsrfToken($method);
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Route not found']);
        break;
}

function checkCsrfToken($method){
    if ($method == 'POST'){
        $csrfToken= $_POST['csrfToken'] ?? '';
        if(!verifyCsrfToken($csrfToken)){
            echo json_encode(['success' =>false,
                'error'=>["token invalide"]]);
            exit;
        }
    }
}


