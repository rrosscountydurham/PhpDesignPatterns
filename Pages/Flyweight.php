<?php

abstract class BaseFoods{
    public $colour;
    public $size;
    public $weight;
    
    public function getFood(){
        return $this->colour . ", " . $this->size . " sized food that weighs " . $this->weight;
    }
    public abstract function sweetOrSour();
}

class Fruits extends BaseFoods{
    public function sweetOrSour(){
        return "I am sweet";
    }
}

class Vegetables extends BaseFoods{
    public function sweetOrSour(){
        return "I am sour";
    }
}

class Food{
    public $FoodData;
    public $ID;
}

class FoodFactory{
    
    public $foodTypes;
    
    public function __construct(){
        $this->fruitTypes = array();
        $this->vegetableTypes = array();
        $this->setFruits();
        $this->setVegetables();
    }
    
    private function setFruits(){
        $banana = new Fruits();
        $banana->colour = "yellow";
        $banana->size = "medium";
        $banana->weight = "2 pounds";
        $this->foodTypes["banana"] = $banana;
        
        $apple = new Fruits();
        $apple->colour = "red";
        $apple->size = "small";
        $apple->weight = "1 pound";
        $this->foodTypes["apple"] = $apple;
    }
    
    private function setVegetables(){
        $carrot = new Vegetables();
        $carrot->color = "orange";
        $carrot->size = "medium";
        $carrot->weight = "1 pound";
        $this->foodTypes["carrot"] = $carrot;
        
        $turnip = new Vegetables();
        $turnip->color = "white";
        $turnip->size = "large";
        $turnip->weight = "3 pounds";
        $this->foodTypes["turnip"] = $turnip;
    }
    
    public function getFood($food){
        if(array_key_exists($food, $this->foodTypes)){
            return $this->foodTypes[$food];
        }else{
            return null;
        }
    }
}

$foodFact = new FoodFactory();

$banana = new Food();
$banana->ID = 0;
$banana->FoodData = $foodFact->getFood("banana");
$banana2 = new Food();
$banana2->FoodData = $foodFact->getFood("banana");
echo $banana->FoodData->getFood() . ". " . $banana2->FoodData->getFood() . ".<br>";

if($banana->FoodData == $banana2->FoodData){
    echo "We are the same!";
}