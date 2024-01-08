<?php

namespace Application\Utilities;

class BaseController {    
    protected function jsonResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    protected function successResponse($data = null, $message = "Success", $statusCode = 200) {
        $response = [
            "success" => true,
            "message" => $message,
            "data" => $data
        ];
        $this->jsonResponse($response, $statusCode);
    }

    protected function errorResponse($message = "Error", $statusCode = 500) {
        $response = [
            "success" => false,
            "message" => $message
        ];
        $this->jsonResponse($response, $statusCode);
    }
}

?>