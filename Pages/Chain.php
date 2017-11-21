<?php

abstract class Handler{
    protected $successor;
    
    public function SetSuccessor($successor){
        $this->successor = $successor;
    }
    
    public function InvokeSuccessor($request){
        if(isset($this->successor)){
            return $this->successor->HandleRequest($request);
        }else{
            return "";
        }
    }
    
    public abstract function HandleRequest($request);
}

class HandlerOne extends Handler{
    public function HandleRequest($request){
        if($request > 0 && $request < 10){
            return "Number is between 0 and 10";
        }else{
            return $this->InvokeSuccessor($request);
        }
    }
}

class HandlerTwo extends Handler{
    public function HandleRequest($request){
        if($request >= 10 && $request < 20){
            return "Number is between 10 and 20";
        }else{
            return $this->InvokeSuccessor($request);
        }
    }
}

class HandlerThree extends Handler{
    public function HandleRequest($request) {
        if($request >= 20){
            return "Number is above 20";
        }else{
            return $this->InvokeSuccessor($request);
        }
    }
}

$handle1 = new HandlerOne();
$handle2 = new HandlerTwo();
$handle3 = new HandlerThree();
$handle1->SetSuccessor($handle2);
$handle2->SetSuccessor($handle3);

$request = array(2,5,13,20,14,1,59,29,23);

foreach($request as $num){
    echo $handle1->HandleRequest($num) . "<br>";
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

