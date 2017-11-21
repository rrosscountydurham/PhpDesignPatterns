<?php
    $squareCarFact = new SquareCarFactory();
    $roundCarFact = new RoundCarFactory();
    $car1 = CarFactoryProducer::genCar($squareCarFact);
    $car2 = CarFactoryProducer::genCar($roundCarFact);
    
    echo $car1->getCarType();
    echo "<br>";
    echo $car2->getCarType();
    echo "<br>";
    
    $linkAbs = new a(INDEX_URL . "Index.php","Go back");
    echo $linkAbs->getFull();