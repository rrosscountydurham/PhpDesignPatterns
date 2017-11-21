<?php

spl_autoload_register(function ($className){
    $includeFolders = [];
    array_push($includeFolders,'Elements',
            'Interfaces','Classes',
            'Interfaces\AbstractFactory','Classes\AbstractFactory');
    foreach($includeFolders as $str){
        if(file_exists(ABS_PATH. "\\" . $str . "\\" . $className . '.php')){
            require(ABS_PATH . "\\" . $str . "\\" . $className . '.php');
        }
    }
});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

