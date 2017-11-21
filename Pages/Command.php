<?php

abstract class Command{
    protected $receiver;
    
    public function __construct($receiver){
        $this->receiver = $receiver;
    }
    
    public abstract function Execute();
}

class BeepHorn extends Command{
    public function Execute(){
        return $this->receiver->Action();
    }
}

interface Receiver{
    public function Action();
}

class CarHorn implements Receiver{
    public function Action(){
        return "Beep beep";
    }
}

class Invoker{
    private $command;
    
    public function __construct($command){
        $this->command = $command;
    }
    
    public function Invoke(){
        return $this->command->Execute();
    }
}

$receiver = new CarHorn();
$command = new BeepHorn($receiver);
$invoker = new Invoker($command);
echo $invoker->Invoke();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

