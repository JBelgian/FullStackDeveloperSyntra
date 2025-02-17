<?php

class Student {
    public $name;
    public $age;
    public $grade;

    function __construct($name, $age, $grade)
    {
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }
}

$student1 = new Student('Johnny', 18, 98);
echo "Student naam: $student1->name, student age: $student1->age, student grade: $student1->grade";