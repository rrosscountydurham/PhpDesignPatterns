<?php

class html{
    const OPENTAG = "<$>";
    const CLOSETAG = "</$>";
    public $tag = "";
    public $attributes = [];
    public $content = "";
    
    function __construct($tagIn){
        $this->tag = $tagIn;
    }
    
    function addAttribute($name,$value){
        $this->attributes[$name] = $value;
    }
    
    function getFull(){
        $returnPrint = "";
        $returnPrint .= $this->getStart();
        $returnPrint .= $this->getContent();
        $returnPrint .= $this->getEnd();
        
        return $returnPrint;
    }
    
    function getStart(){
        $returnPrint = $this::OPENTAG;
        $innerTag = $this->tag;
        foreach($this->attributes as $key=>$value){
            $innerTag .= ' ' . $key . "='" . $value . "'";
        }
        $returnPrint = str_replace('$', $innerTag, $returnPrint);
        echo $returnPrint;
        return $returnPrint;
    }
    
    function getContent(){
        return $this->content;
    }
    
    function getEnd(){
        $returnPrint = $this::CLOSETAG;
        str_replace('$',$this->tag,$returnPrint);
        return $returnPrint;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

