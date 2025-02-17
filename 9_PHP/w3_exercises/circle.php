<?php

class Circle {
    private $radius;

    function __construct($radius)
    {
        $this->radius = $radius;
    }

    function calcArea() {
        $area = pow($this->radius, 2) * pi();
        return $area;
    }

    function calcPerimeter() {
        $peri = $this->radius * pi() * 2;
        return $peri;
    }
}

$circle1 = new Circle(4,5);

echo "Area: " . $circle1->calcArea() . "<br>";
echo "Perimeter: " . $circle1->calcPerimeter() . "<br>";
