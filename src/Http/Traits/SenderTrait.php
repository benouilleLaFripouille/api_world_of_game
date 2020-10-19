<?php


namespace Wog\Http\Traits;


trait SenderTrait
{
    public function send()
    {
        header("HTTP/1.1 " . $this->getStatus());
        foreach ($this->getHeaders() as $key => $value) {
            header($key . ": " . $value);
        }
        echo($this->getBody());
    }
}