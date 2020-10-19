<?php


namespace Wog\Http;


interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return mixed
     */
    public function getUri();

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function post();

    /**
     * @return \stdClass
     */
    public function json(): \stdClass;
}