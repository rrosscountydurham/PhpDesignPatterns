<?php

abstract class Shoes{
    public abstract function getShoe();
}
class Trainers extends Shoes{
    public function getShoe(){return "Trainers";}
}
class Slippers extends Shoes{
    public function getShoe(){return "Slippers";}
}

abstract class ShoeFactoryBase{
    public abstract function MakeShoe($type);
}

class ShoeFactory extends ShoeFactoryBase{
    public function MakeShoe($type){
        switch($type){
            case 1: return new Trainers(); break;
            case 2: return new Slippers(); break;
            default: return null;
        }
    }
}

$shoeFact = new ShoeFactory();
$shoe1 = $shoeFact->MakeShoe(1);
$shoe2 = $shoeFact->MakeShoe(2);

echo $shoe1->getShoe() . "<br>";
echo $shoe2->getShoe() . "<br>";