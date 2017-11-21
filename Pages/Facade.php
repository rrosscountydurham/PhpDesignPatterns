<?php

class functionOne{
    function getResult(){
        return 100;
    }
}

class functionTwo{
    function getResult($val){
        return $val * 100;
    }
}

class functionThree{
    function getResult($val){
        return $val / 25;
    }
}

class functionFour{
    function getResult($val){
        return $val * 10;
    }
}

class functionFive{
    public $val;
    function __construct($val){
        $this->val = $val;
    }
}

class Facade{
    function getResult(){
        $f1 = new functionOne();
        $f2 = new functionTwo();
        $f3 = new functionThree();
        $f4 = new functionFour();
        
        $val = $f1->getResult();
        $val = $f2->getResult($val);
        $val = $f3->getResult($val);
        $val = $f4->getResult($val);
        $f5 = new functionFive($val);
        return $f5;
    }
}

$facade = new Facade;
echo $facade->getResult()->val;