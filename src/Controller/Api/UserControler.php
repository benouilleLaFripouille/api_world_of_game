<?php

namespace Wog\Controller\Api;

use Wog\Http\Request;
use Wog\Http\Response;
use Wog\Model\UserModel;
use Wog\Repository\UserRepository;

class UserControler
{
    private
        /**
         * @var Request
         */
        $request,
        /**
         * @var Response
         */
        $response;

    public function __construct(
        Request $request,
        Response $response
    )
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function create(): Response
    {
        try {
            $user = new UserModel($this->request->json());
            if (!$user->getPhone()
                || !$user->getSurname()
                || !$user->getFirstName()
                || !$user->getLastName()
                || !$user->getEmail()
                || !$user->getAdress()
                || !$user->getCity()
                || !$user->getZip()
                || !$user->getPassword()
            ) {
                $this->response->setStatus(422, "Unprocessable Entity");
                $this->response->setError(" Unprocessable Entity");
                return $this->response;
            }
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $user->setToken(md5($user->getPassword()));
            $repository = new UserRepository();
            $repository->insert($user);
            $this->response->setStatus(201, "Created");
            $this->response->setBody(json_encode($user));
        } catch (\PDOException $e) {
            if ("23000" === $e->getCode()) {
                $this->response->setStatus(409, "Conflict");
                $this->response->setError(" Conflict");
            } else {
                throw $e;
            }
        }
        return $this->response;

    }

    public function read(): Response
    {
        $repository = new UserRepository();
        $users = $repository->select();
        $this->response->setBody(json_encode($users));
        return $this->response;
    }

    public function update(): Response
    {

    }

    public function delete(): Response
    {

    }

}