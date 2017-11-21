<?php

interface SandwichPlan{
    public function setBread($breadType);
    public function setSpread($spreadType);
    public function setFilling($fillType);
}

class Sandwich implements SandwichPlan{
    private $bread;
    private $spread;
    private $fill;
     
    public function setBread($breadType){$this->bread = $breadType;}
    public function setSpread($spreadType){$this->spread = $spreadType;}
    public function setFilling($fillType){$this->fill = $fillType;} 
    
    public function getBread(){return $this->bread;}
    public function getSpread(){return $this->spread;}
    public function getFilling(){return $this->fill;}
    
    public function getSandwich(){
        return $this->getBread() . " " . $this->getSpread() . " " . $this->getFilling() . " sandwich";
    }
}

interface SandwichBuilder{
    public function createBread();
    public function createSpread();
    public function createFilling();
    public function getSandwich();
}

class HamSandwich implements SandwichBuilder{
    
    private $sandwich;
    
    public function __construct(){
        $this->sandwich = new Sandwich();
    }
    public function createBread(){$this->sandwich->setBread("White");}
    public function createSpread(){$this->sandwich->setSpread("Butter");}
    public function createFilling(){$this->sandwich->setFilling("Ham");}
    public function getSandwich(){return $this->sandwich;}
}

class CheeseSandwich implements SandwichBuilder{
    private $sandwich;
    
    public function __construct(){
        $this->sandwich = new Sandwich();
    }
    public function createBread(){$this->sandwich->setBread("Brown");}
    public function createSpread(){$this->sandwich->setSpread("No Butter");}
    public function createFilling(){$this->sandwich->setFilling("Cheese");}
    public function getSandwich(){return $this->sandwich;}
}

class SandwichCreator{
    private $sandwichBuilder;
    
    public function __construct($sandwichBuilder){
        $this->sandwichBuilder = $sandwichBuilder;
    }
    
    public function setSandwich($sandwichBuilder){
        unset($this->sandwichBuilder);
        $this->sandwichBuilder = $sandwichBuilder;
        $this->buildSandwich();
    }
    public function getSandwich(){
        return $this->sandwichBuilder->getSandwich();
    }
    
    public function buildSandwich(){
        $this->sandwichBuilder->createBread();
        $this->sandwichBuilder->createSpread();
        $this->sandwichBuilder->createFilling();
    }
}

$HamSandwichBuilder = new HamSandwich();
$SandwichCreator = new SandwichCreator($HamSandwichBuilder);
$SandwichCreator->buildSandwich();
$HamSandwich = $SandwichCreator->getSandwich();
$CheeseSandwichBuilder = new CheeseSandwich();
$SandwichCreator->setSandwich($CheeseSandwichBuilder);
$CheeseSandwich = $SandwichCreator->getSandwich();

echo $HamSandwich->getSandwich() . "<br>";
echo $CheeseSandwich->getSandwich();