<?php


namespace Wog\Controller\Api;


use Wog\Http\Request;
use Wog\Http\Response;
use Wog\Model\LoginModel;
use Wog\Repository\LoginRepository;
use Wog\Repository\UserRepository;


class LoginController
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
        $this->response = $response;
        $this->request = $request;

    }

    public function login()
    {
        try {
            if (!array_key_exists("email", $this->request->get())
                || !array_key_exists("password", $this->request->get())
            ) {
                $this->response->setStatus(422, "Unprocessable Entity");
                $this->response->setError(" user incomplete");
                return $this->response;
            }
            $repository = new UserRepository();
            $user = $repository->selectByEmail($this->request->get()["email"]);
            if (!password_verify($this->request->get()["password"], $user->getPassword())) {
                throw new \TypeError();

            }
            $jsonString=json_encode($user);
            $jsonObject=json_decode($jsonString);
            $jsonObject->token=$user->getToken();
            $this->response->setStatus(200, "ok");
            $this->response->setBody(json_encode($jsonObject));
        } catch (\TypeError $e) {
            $this->response->setStatus(404, "non existing user");
            $this->response->setError(" non existing user");
        }
        return $this->response;

//        $login = new LoginModel($this->request->get());
//        if (!$login->getEmail()
//            || !$login->getPassword()
//        ) {
//            $this->response->setStatus(404, "non existing user");
//            $this->response->setError(" non existing user");
//            return $this->response;
//        }
//        $repository = new LoginRepository();
//        $results = $repository->verif($login);
//        $this->response->setBody(json_encode($results));
//
//        return $this->response;
    }


}