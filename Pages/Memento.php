<?php

class Originator{
    public $data;
    
    public function GetMemento(){
        return new Memento($this->data);
    }
    
    public function SetMemento($memento){
        $this->data = $memento->GetData();
    }
}

class Memento{
    private $data;
    
    public function __construct($data){
        $this->data = $data;
    }
    
    public function GetData(){
        return $this->data;
    }
}

class Caretaker{
    public $memento;
}

$data = new Originator();
$data->data = "Hello";
$caretaker = new Caretaker();
$caretaker->memento = $data->GetMemento();
$data->data = "Goodbye";
echo $data->data . "<br>";
$data->SetMemento($caretaker->memento);
echo $data->data . "<br>";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

