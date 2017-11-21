<?php

class Context{
    private $state;
    
    public function __construct($state){
        $this->state = $state;
    }
    
    public function Request(){
        $this->state->Handle($this);
    }
    
    public function GetState(){
        return $this->state;
    }
    
    public function SetState($state){
        unset($this->state);
        $this->state = $state;
    }
}

abstract class StateBase{
    public abstract function Handle($context);
}

class StateA extends StateBase{
    public function Handle($context){
        echo "Handle called from StateA" . "<br>";
        $context->SetState(new StateB());
    }
}

class StateB extends StateBase{
    public function Handle($context){
        echo "Handle called from StateB" . "<br>";
        $context->SetState(new StateA());
    }
}

$context1 = new Context(new StateA());
$context1->Request();
$context1->Request();
$context2 = new Context(new StateB());
$context2->Request();
$context2->Request();


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

