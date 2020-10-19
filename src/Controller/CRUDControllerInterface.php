<?php


namespace Wog\Controller;


use Wog\Http\ResponseInterface;


interface CRUDControllerInterface
{
    /**
     * Triggered for GET Http method
     *
     * Responsible to query a model and put it in the ResponseInterface body
     * Must retrieve 200 ResponseInterface for found resource
     * Must retrieve 404 ResponseInterface for not found resource
     *
     * @return ResponseInterface
     *
     * @throws \PDOException for all pdo errors
     */
    public function retrieve(): ResponseInterface;

    /**
     * Triggered for POST Http method
     *
     * Responsible to query a model and put it in the ResponseInterface body
     * Must retrieve 201 ResponseInterface for created resource
     * Must retrieve 409 ResponseInterface for conflict
     * Must retrieve 422 ResponseInterface for unprocessable entity
     *
     * @return ResponseInterface
     *
     * @throws \PDOException for all pdo errors
     */
    public function create(): ResponseInterface;

    /**
     * Triggered for PUT Http method
     *
     * Responsible to query a model and put it in the ResponseInterface body
     * Must retrieve 200 ResponseInterface for updated resource
     * Must retrieve 409 ResponseInterface for conflict
     * Must retrieve 422 ResponseInterface for unprocessable entity
     *
     * @return ResponseInterface
     *
     * @throws \PDOException for all pdo throwable except constraint integrity violation
     */
    public function update(): ResponseInterface;


    /**
     * Triggered for DELETE Http method
     *
     * Responsible to query a model and put it in the ResponseInterface body
     * Must retrieve 200 ResponseInterface for deleted resource
     * Must retrieve 404 ResponseInterface for not found resource
     *
     * @return ResponseInterface
     *
     * @throws \PDOException for all pdo throwable except constraint integrity violation
     */
    public function delete(): ResponseInterface;


}