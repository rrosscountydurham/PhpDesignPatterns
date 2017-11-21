<?php

interface MyIterator{
    public function hasNext();
    public function next();
}

interface Container{
    public function getIterator();
}

class FruitCollection implements Container{
    public $fruits;
    
    public function __construct(){
        $this->fruits = array("Banana","Apple","Orange");
    }
    
    public function getIterator(){
        return new FruitIterator($this);
    }
}

class FruitIterator implements MyIterator{
    private $pos;
    private $collection;
    
    public function __construct($collection){
        $this->pos = -1;
        $this->collection = $collection;
    }
    
    public function hasNext(){
        if(sizeof($this->collection->fruits) - 1 > $this->pos){
            return true;
        }else{
            return false;
        }
    }
    
    public function next(){
        if($this->hasNext()){
            $this->pos++;
            return $this->collection->fruits[$this->pos];
        }else{
            return false;
        }
    }
}

$collection = new FruitCollection();
$iterator = new FruitIterator($collection);
while($iterator->hasNext()){
    echo $iterator->next() . "<br>";
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

