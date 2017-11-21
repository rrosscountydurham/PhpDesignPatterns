<?php

class FruitMaker{
    private $generator;
    
    public function __construct($generator){
        $this->generator = $generator;
    }
    
    public function CreateFruit(){
        return $this->generator->CreateFruit();
    }
    
    public function SetGenerator($generator){
        $this->generator = $generator;
    }
}

abstract class FruitConstructBase{
    public abstract function CreateFruit();
}

class BananaConstruct extends FruitConstructBase{
    public function CreateFruit(){
        return "Banana";
    }
}

class AppleConstruct extends FruitConstructBase{
    public function CreateFruit(){
        return "Apple";
    }
}

$FruitMaker = new FruitMaker(new BananaConstruct());
echo $FruitMaker->CreateFruit() . "<br>";
$FruitMaker->SetGenerator(new AppleConstruct());
echo $FruitMaker->CreateFruit() . "<br>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

