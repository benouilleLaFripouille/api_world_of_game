<?php

namespace Wog\Http;

class Response
{
    private
        /**
         * @var int
         */
        $statusCode,
        /**
         * @var string
         */
        $statusText,
        /**
         * @var string
         */
        $body,
        /**
         * @var array
         */
        $headers;

    public function __construct()
    {
        $this->statusCode = 200;
        $this->statusText = "OK";
        $this->headers = [
            "Access-Control-Allow-Origin" => "*",
            "Access-Control-Allow-Methods" => "GET,POST,PUT,DELETE,OPTIONS",
            "Access-Control-Allow-Headers" => "Content-type",
            "Content-type" => "application/json",
        ];
        $this->body = "{}";
    }

    public function setError($message): void
    {
        $this->setBody(json_encode([
            "code" => $this->statusCode,
            "message" => utf8_encode($message)
        ]));
    }

    /**
     * @param int $statusCode
     * @param string $statusText
     */
    public function setStatus(int $statusCode, string $statusText): void
    {
        $this->statusCode = $statusCode;
        $this->statusText = $statusText;
    }


    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->statusCode . " " . $this->statusText;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers): void
    {
        $this->headers = $headers;
    }

    public function send()
    {
        header("HTTP/1.1 " . $this->getStatus());
        foreach ($this->getHeaders() as $key => $value) {
            header($key . ": " . $value);
        }
        echo($this->getBody());
    }
}

