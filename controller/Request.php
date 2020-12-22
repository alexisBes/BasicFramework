<?php

class Request  
{
    private $parameters;
    public function __construct($parameter){
        $this->parameters = $parameter;
    }
    public function existParameters($name){
        return (isset($this->parameters[$name])&& $this->parameters[$name] != "");
    }
    public function getParameter($name){
        if ($this->existParameters($name)) {
            return $this->parameters[$name];
        }else {
            throw new Exception("Paremeters $name not found in the request");
        }
    }
}


?>