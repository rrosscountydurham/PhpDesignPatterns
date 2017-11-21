<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Car
 *
 * @author rross
 */
class Car {
    public $wheel;
    public $frame;
    
    function __construct($wheel,$frame){
        $this->wheel = $wheel;
        $this->frame = $frame;
    }
    
    function getCarType(){
        return $this->frame->GetFrame() . " car with a " . $this->wheel->RoundAndRound() . " wheel.";
    }
    
}
