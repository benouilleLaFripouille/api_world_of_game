<?php

use  Wog\Http\Request;
use Wog\Http\Response;
use Wog\Controller\Api\UserControler;
use Wog\Controller\Api\LoginController;

require './../vendor/autoload.php';

try {
    $response = new Response();
    $request = new Request();
    if ($request->getMethod() === "options") {
        $response->setStatus("200","OK");

    } elseif ($request->getUri() === "/users") {
        $controller = new UserControler($request, $response);
        if ($request->getMethod() === "get") {
            $response = $controller->read();
        } elseif ($request->getMethod() === "post") {
            $response = $controller->create();
        } else {
            $response->setStatus(405, "Method Not Allowed");
            $response->setError("The Method: " . $request->getMethod() . " is Not Allowed");
        }
    } elseif ($request->getUri() === "/login") {
        $controller = new LoginController($request, $response);
        if ($request->getMethod() === "get") {
            $response = $controller->login();
        } else {
            $response->setStatus(405, "Method Not Allowed");
            $response->setError("The Method: " . $request->getMethod() . " is Not Allowed");
        }
    } else {
        $response->setStatus(404, "Not Found");
        $response->setError("The URI: " . $request->getUri() . " is Not Found");
    }
} catch (Throwable $e) {
    $response->setStatus(500, "Internal Server Error");
    $response->setError($e->getMessage() . " (" . $e->getFile() . " [" . $e->getLine() . "])");
}

$response->send();
