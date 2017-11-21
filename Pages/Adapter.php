<?php

class RectangleA{
    public $x; public $y; public $h; public $w;
    
    public function getRectArea(){
        return $this->h * $this->w;
    }
}

interface RectangleB{
    function getArea();
}

class RectangleAdapter implements RectangleB{
    
    public $adaptee;
    
    function __construct(){
        $this->adaptee = new RectangleA();
        $this->adaptee->h = 100; $this->adaptee->w = 100;
    }
    
    function getArea(){
        return $this->adaptee->getRectArea();
    }
}

class Client{
    private $rectangle;
            
    public function __construct($rectIn){
        $this->rectangle = $rectIn;
    }
    
    function makeRequest(){
        return $this->rectangle->getArea();
    }
}

$client = new Client(new RectangleAdapter());
echo $client->makeRequest();