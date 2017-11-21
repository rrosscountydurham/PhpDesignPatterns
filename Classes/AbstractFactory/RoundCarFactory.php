<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarFactory
 *
 * @author rross
 */
class RoundCarFactory extends AbstractCarFactory{
    public function getFrame() {
        return new RoundFrame();
    }
    public function getWheel(){
        return new RoundWheel();
    }
}
