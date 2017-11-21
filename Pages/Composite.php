<?php

interface Sports{
    function getSelf();
}

class SportsComposite implements Sports{
    private $children;
    private $name;
    
    public function __construct($name){
        $this->children = array();
        $this->name = $name;
    }
    
    public function AddChild($child){
        array_push($this->children,$child);
    }
    
    public function RemoveChild($child){
        $found = array_search($child,$this->children);
        if(isset($found)){
            unset($this->children[$found]);
        }
    }
    
    public function getChild($childIndex){
        if($childIndex < count($this->children)){
            return $this->children[$childIndex];
        } else {
            return null;
        }
    }
    
    public function getSelf(){
        $returnVal = $this->name . " ";
        foreach ($this->children as $child){
            $returnVal .= $child->getSelf() . " ";
        }
        return $returnVal;
    }
}

class SportsLeaf implements Sports{
    private $name;
    
    public function __construct($name){
        $this->name = $name;
    }
    
    public function getSelf(){
        return $this->name;
    }
}

$football = new SportsComposite("Football");
$football->AddChild(new Sportsleaf("Soccer"));
$rounders = new SportsComposite("Rounders");
$rounders->AddChild(new SportsLeaf("Baseball"));
$ballsports = new SportsComposite("Ball sports");
$ballsports->AddChild($football);
$ballsports->AddChild($rounders);
echo $ballsports->getSelf();