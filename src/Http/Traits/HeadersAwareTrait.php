<?php


namespace Wog\Http\Traits;


trait HeadersAwareTrait
{
    protected

        /**
         * @var array
         */
        $headers;

    /**
     * @return mixed
     */
    public function getHeaders(): array
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
}