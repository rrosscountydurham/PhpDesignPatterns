<?php

class OnlyOne{
    private static $instance;
    public $one;
    public $two;
    public $three;
    
    protected function __construct(){
        $this->one = 1; $this->two = 2; $this->three = 3;
    }
    
    public static function getOne(){
        if(self::$instance == null){
            self::$instance = new OnlyOne();
        }
        return self::$instance;
    }
}

$Only = OnlyOne::getOne();
$One = OnlyOne::getOne();

echo $Only->one . $One->two;

$One->two = 3;

echo $Only->two . $One->two;