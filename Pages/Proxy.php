<?php

abstract class Fruit{
    public $colour;
    public $size;
    public $weight;
    
    abstract function getFruit();
}

class RealBanana extends Fruit{
    
    public function __construct(){
        $this->color = "yellow";
        $this->size = "medium";
        $this->weight = "3 pounds";
    }
    
    public function getFruit(){
        return $this->color . " " . $this->size . " " . $this->weight;
    }
}

class ProxyBanana extends Fruit{
    
    private $realBanana;
    
    public function __construct(){
        
    }
    
    public function getFruit(){
        if(!isset($this->realBanana)){
            $this->realBanana = new RealBanana();
        }
        return $this->realBanana->getFruit();
    }
}

$proxyBanana = new ProxyBanana();
echo $proxyBanana->getFruit();