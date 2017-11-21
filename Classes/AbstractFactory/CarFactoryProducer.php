<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarFactoryProducer
 *
 * @author rross
 */
class CarFactoryProducer{
    public static function genCar($factory){
        $returnCar = new Car($factory->getWheel(),$factory->getFrame());
        
        return $returnCar;
    }
}
