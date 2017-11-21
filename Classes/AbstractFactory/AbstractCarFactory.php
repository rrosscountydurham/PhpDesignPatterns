<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractCarFactory
 *
 * @author rross
 */
abstract class AbstractCarFactory {
    abstract function getWheel();
    abstract function getFrame();
}
