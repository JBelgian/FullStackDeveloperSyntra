<?php

class Vehicle {
    private $brand;
    private $model;
    private $year;

    function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    function displayDetails()
    {
        echo 'Brand:' . $this->brand . '<br>';
        echo 'Model:' . $this->model . '<br>';
        echo 'Year:' . $this->year . '<br>';
    }
}

$car1 = new Vehicle('Ford', 'F150', 2024);
echo $car1->displayDetails();