<?php

class ObjectContainer{
    
    public $elements;
    
    public function __construct(){
        $this->elements = array();
    }
    
    public function AddElement($element){
        array_push($this->elements,$element);
    }
    
    public function AcceptVisitor($visitor){
        foreach($this->elements as $e){
            $e->Accept($visitor);
        }
    }
}

abstract class ElementBase{
    public abstract function Accept($visitor);
}

class ElementA extends ElementBase{
    public $name;
    
    public function Accept($visitor) {
        $visitor->VisitName($this);
    }
}

class ElementB extends ElementBase{
    public $title;
    
    public function Accept($visitor){
        $visitor->VisitTitle($this);
    }
}

abstract class VisitorBase{
    public abstract function VisitName($element);
    public abstract function VisitTitle($element);
}

class VisitorA extends VisitorBase{
    
    private $name;
    private $title;
    
    public function VisitName($element) {
        $this->name = $element->name;
    }

    public function VisitTitle($element) {
        $this->title = $element->title;
    }

    public function GetSelf(){
        return $this->title . " " . $this->name;
    }
}

class VisitorB extends VisitorBase{
    
    private $name;
    private $title;
    
    public function VisitName($element) {
        $this->name = $element->name;
    }

    public function VisitTitle($element) {
        $this->title = $element->title;
    }

    public function GetSelf(){
        return $this->name . " " . $this->title;
    }
}

$elementA = new ElementA();
$elementA->name = "Bob";
$elementB = new ElementB();
$elementB->title = "Mr";
$container = new ObjectContainer();
$container->AddElement($elementA);
$container->AddElement($elementB);
$visitorA = new VisitorA();
$container->AcceptVisitor($visitorA);
echo $visitorA->GetSelf() . "<br>";
$visitorB = new VisitorB();
$elementA->name = "Prometheus";
$elementB->title = "Master";
$container->AcceptVisitor($visitorB);
echo $visitorB->GetSelf();


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

