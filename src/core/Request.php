<?php

namespace app\core;


class Request
{
    protected Validated $validated;

    public function __construct()
    {
        $this->validated = new Validated();
    }


    public function getMethod():string
    {
        $method = strtolower($_SERVER["REQUEST_METHOD"]);

        return $method;
    }

    public function getPath():string
    {
        $path = $_SERVER["PATH_INFO"] ?? '/';
        
        return $path;
    }

    public function isPost():bool
    {
        $method = strtolower($_SERVER["REQUEST_METHOD"]);

        return $method == "post";
    }

    public function getBody():array
    {
      
        return $_POST;
    }

    public function validate(array $rule = [])
    {
        return $this->validated->validate($this->getBody(),$rule);

    }
    public function isValid():bool
    {
        return $this->validated->isValid();
    }
   

}