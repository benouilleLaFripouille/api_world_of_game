<?php


namespace Wog\Http;


interface HttpResourceInterface
{
    /**
     * @return mixed
     */
    public function getHeaders(): array;

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers): void;
}