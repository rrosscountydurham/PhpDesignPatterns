<?php

class a extends html{
    function __construct($url,$text){
        parent::__construct("a");
        parent::addAttribute("href",$url);
        $this->content = $text;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

