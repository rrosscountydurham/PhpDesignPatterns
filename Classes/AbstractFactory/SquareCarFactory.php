<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrameFactory
 *
 * @author rross
 */
class SquareCarFactory extends AbstractCarFactory {
    public function getFrame() {
        return new SquareFrame();
    }
    public function getWheel(){
        return new SquareWheel();
    }
}
