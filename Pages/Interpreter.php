<?php

interface Expression{
    public function interpret($context);
}

class Data implements Expression{
    private $data;
    
    public function __construct($data){
        $this->data = $data;
    }
    function interpret($context){
        if(strpos($context,$this->data) === false){
            return false;
        }
        else{
            return true;
        }
    }
}

class AndExp implements Expression{
    private $exp1;
    private $exp2;
    
    public function __construct($exp1,$exp2){
        $this->exp1 = $exp1;
        $this->exp2 = $exp2;
    }
    
    public function interpret($context){
        return $this->exp1->interpret($context) && $this->exp2->interpret($context);
    }
}

class OrExp implements Expression{
    private $exp1;
    private $exp2;
    
    public function __construct($exp1,$exp2){
        $this->exp1 = $exp1;
        $this->exp2 = $exp2;
    }
    
    public function interpret($context){
        return $this->exp1->interpret($context) || $this->exp2->interpret($context);
    }
}

function isFruit(){
    $exp1 = new Data("Banana");
    $exp2 = new Data("Apple");
    return new OrExp($exp1,$exp2);
}

function canEat(){
    $exp1 = new Data("Is food");
    $exp2 = new Data("Is tasty");
    return new AndExp($exp1,$exp2);
}

$isFruit = isFruit();
$canEat = canEat();
echo "Is a Banana a fruit? " . ($isFruit->interpret("Banana") ? "yes" : "no") . "<br>";
echo "Is a Carrot a fruit? " . ($isFruit->interpret("Carrot") ? "yes" : "no") . "<br>";
echo "Can I eat an Apple? " . ($canEat->interpret("Is food Is tasty") ? "yes" : "no") . "<br>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

