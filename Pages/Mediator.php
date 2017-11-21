<?php

abstract class Colleague{
    protected $mediator;
    
    public function __construct($mediator){
        $this->mediator = $mediator;
    }
    
    abstract function Send();
    abstract function Receive($input);
}

class ColleagueA extends Colleague{
    public function Send(){$this->mediator->Send($this);}
    public function Receive($input){echo $input . "<br>";}
}

class ColleagueB extends Colleague{
    public function Send(){$this->mediator->Send($this);}
    public function Receive($input){echo $input . "<br>";}
}

abstract class Mediator{
    abstract function Send($caller);
}

class MediatorA extends Mediator{
    public $colleague1;
    public $colleague2;
    
    public function __construct(){
        $this->colleague1 = new ColleagueA($this);
        $this->colleague2 = new ColleagueB($this);
    }
    
    public function Send($caller){
        if ($caller == $this->colleague1) {
            $this->colleague2->Receive("Colleague 1 sent a message");
        } else {
            $this->colleague1->Receive("Colleague 2 sent a message");
        }
    }
}

$mediator = new MediatorA();
$mediator->colleague1->Send();
$mediator->colleague2->Send();


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

