<?php

class Rectangle {
    private $width;
    private $length;

    function __construct($width, $length)
    {
        $this->width = $width;
        $this->length = $length;
    }

    function calcArea() {
        $area = $this->width * $this->length;
        return $area;
    }

    function calcPerimeter() {
        $peri = ($this->width + $this->length)*2;
        return $peri;
    }
}

$rectangle1 = new Rectangle(4,5);

echo "Area: " . $rectangle1->calcArea() . "</br>";
echo "Perimeter: " . $rectangle1->calcPerimeter() . "</br>";
