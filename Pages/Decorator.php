<?php

abstract class FoodBase{
    public abstract function isFresh();
}

class FreshFruit extends FoodBase{
    function isFresh(){
        return "I am fresh";
    }
}

class RottenFruit extends FoodBase{
    function isFresh() {
       return "I am rotten";
    }
}

abstract class FoodDecorator extends FoodBase{
    private $fruit;
    
    public function __construct($fruit){
        $this->fruit = $fruit;
    }
    
    function isFresh(){
        return $this->fruit->isFresh();
    }
}

class FoodConcrete extends FoodDecorator{
    function isFresh(){
        $returnVal = parent::isFresh();
        $returnVal .= " and I am smelly";
        return $returnVal;
    }
}

class FoodConcreteTwo extends FoodDecorator{
    function isFresh(){
        $returnVal = parent::isFresh();
        $returnVal .= " and I smell lovely";
        return $returnVal;
    }
}

$ripeFruit = new FoodConcreteTwo(new FreshFruit());
$rottenFruit = new FoodConcrete(new RottenFruit());
echo $ripeFruit->isFresh() . "<br>";
echo $rottenFruit->isFresh();