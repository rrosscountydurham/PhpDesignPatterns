<?php

interface CookingType{
    public function DoCooking();
}

class Grate implements CookingType{
    public function DoCooking(){
        return "I will grate the food";
    }
}

class Chop implements CookingType{
    public function DoCooking(){
        return "I will chop the food";
    }
}

class Recipe{
    public $cookingType;
    
    public function __construct($cookingType){$this->cookingType = $cookingType;}
    
    public function doRecipe(){
        return $this->cookingType->DoCooking();
    }
}

class SpecialRecipe extends Recipe{
    
    public function doRecipe(){
        return "In this special recipe " . $this->cookingType->DoCooking();
    }
}

$recipe = new Recipe(new Chop());
echo $recipe->doRecipe() . "<br>";
$recipe = new SpecialRecipe(new Grate());
echo $recipe->doRecipe();