<?php

abstract class SubjectBase{
    private $observers;
    
    public function __construct(){
        $this->observers = array();
    }
    
    public function AttachObserver($observer){
        array_push($this->observers,$observer);
    }
    
    public function RemoveObserver($observer){
        if(($key = array_search($observer,$this->observers)) !== false){
            unset($this->observers[$key]);
        }
    }
    
    public function NotifyObservers(){
        foreach($this->observers as $o){
            $o->Update();
        }
    }
}

class ConcreteBase extends SubjectBase{
    private $state;
    
    public function GetState(){
        return $this->state;
    }
    
    public function SetState($state){
        $this->state = $state;
        $this->NotifyObservers();
    }
}

abstract class ObserverBase{
    public abstract function Update();
}

class ConcreteObserver extends ObserverBase{
    private $subject;
    
    public function __construct($subject){
        $this->subject = $subject;
    }
    
    public function Update(){
        $subjectState = $this->subject->GetState();
        echo "The message I got was " . $subjectState . "<br>";
    }
}

$person1 = new ConcreteBase();
$person2 = new ConcreteBase();
$person1->SetState("Bob");
$person2->SetState("Prometheus");
$observer1 = new ConcreteObserver($person2);
$observer2 = new ConcreteObserver($person1);
$person1->AttachObserver($observer1);
$person2->AttachObserver($observer2);
$person1->NotifyObservers();
$person2->NotifyObservers();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

