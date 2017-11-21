<?php

abstract class MakeFruitBase{
    
    public function CreateFruit(){
        $fruit = "";
        $fruit = $this->SetColour($fruit);
        $fruit = $this->SetSize($fruit);
        $fruit = $this->SetWeight($fruit);
        return $fruit;
    }
    
    public abstract function SetColour($fruit);
    public abstract function SetSize($fruit);
    public abstract function SetWeight($fruit);
}

class MakeBanana extends MakeFruitBase{
    public function SetColour($fruit){
        return $fruit . "Yellow ";
    }

    public function SetSize($fruit) {
        return $fruit . "Medium ";
    }

    public function SetWeight($fruit) {
        return $fruit . "1 pound";
    }
}

class MakeApple extends MakeFruitBase{
    
    public function SetColour($fruit) {
        return $fruit . "Red ";
    }

    public function SetSize($fruit) {
        return $fruit . "Small ";
    }

    public function SetWeight($fruit) {
        return $fruit . "half pound";
    }

}

$banana = new MakeBanana();
$apple = new MakeApple();

echo $banana->CreateFruit() . "<br>";
echo $apple->CreateFruit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

