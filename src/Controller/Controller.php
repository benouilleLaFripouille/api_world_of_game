<?php


namespace Wog\Controller;

use Wog\Controller\Api\LoginController;
use Wog\Controller\Api\UserController;
use Wog\Http\Request;
use Wog\Http\RequestInterface;
use Wog\Http\Response;
use Wog\Http\ResponseInterface;

abstract class Controller implements CRUDControllerInterface

{
    protected
        /**
         * @var RequestInterface
         */
        $request,
        /**
         * @var ResponseInterface
         */
        $response;

    public function __construct(
        RequestInterface $request,
        ResponseInterface $response
    )
    {
        $this->request = $request;
        $this->response = $response;
    }
}