<?php

abstract class BikeParts{
    public abstract function CloneSelf();
}

class Wheel extends BikeParts{
    public $spokes;
    public $treads;
    
    public function CloneSelf(){
        return clone ($this);
    }
    
    public function printSelf(){
        return $this->spokes . " spokes and the treads are " . $this->treads;
    }
}

class Frame extends BikeParts{
    public $crossbar;
    public $seat;
    
    public function CloneSelf(){
        return clone ($this);
    }
}

class Bike extends BikeParts{
    public $wheel;
    public $frame;
    
    public function CloneSelf(){
        return clone ($this);
    }
    
    function __clone() {
        $this->wheel = clone $this->wheel;
        $this->frame = clone $this->frame;
    }
}

$Wheel1 = new Wheel();
$Wheel1->spokes = 10;
$Wheel1->treads = "safe";
$Wheel2 = $Wheel1->CloneSelf();
$Wheel2->spokes = 12;
$Wheel2->treads = "not safe";

echo $Wheel1->printSelf() . "<br>" . $Wheel2->printSelf() . "<br>";

$Bike1 = new Bike();
$Bike1->wheel = $Wheel1;
$Bike1->frame = new frame();
$Bike2 = $Bike1->CloneSelf();
$Bike2->wheel->spokes = 14;

echo $Bike1->wheel->printSelf() . "<br>" . $Bike2->wheel->printSelf() . "<br>";