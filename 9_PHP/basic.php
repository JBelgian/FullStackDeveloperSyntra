<?php
// PHP PARSER van php code naar HTML
// php modus
// dev server (local) php -S localhost:8000 (in file folder)
// index.php (document root) localhost:8000 (index.php)
// otherfiles.php localhost:8000/otherfiles.php

// variables
$a = 5;
$b = 'single quote';
$c = "double quote";
$d = 2.5;

// concatenate glues strings together!
$concatenate = $b.' - '.$c;
$concatenateDouble = "$b - $c";

$escaped = "Wij zijn de \"Vikings\" van het noorden";
echo $escaped;

// if elseif else

if ($a == 3) {
    echo 'a is 3';
} elseif ($a == 4) {
    echo 'a is 4';
} elseif ($a == 5) {
    echo 'a is 5';
} else {
    echo 'a is not 3 or 4 or 5';
}

// arrays arrays arrays
$myArray = ['a','b','c'];
echo $myArray[0]; // return a;
echo $myArray[1]; // return b;
echo $myArray[2]; // return c;

// no go echo $myArray;

print_r($myArray);

// iteraties while/for/foreach
$i = 0;
$arrayLenght = count($myArray);
while($i < $arrayLenght) {
    echo $myArray[$i];
    $i++;
}

for ($i = 0; $i > 3; $i++) {
    echo $myArray[$i];
}

foreach ($myArray as $value) {
    echo $value;
}

# single comment
// single comment

// Create an array with favorite dishes
// if cevapi is in the list, print "Mmmmmmm"

$favDishes = ["Pizza", "Burger", "Tacos", "Sushi", "Cevapi"];
print_r($favDishes);

echo "<h2>My favorite dishes</h2>";
echo "<ul>";
foreach ($favDishes as $dish) {
    if ($dish == "Cevapi") {
        echo "<li>$dish - Mmmmmm</li>";
    } else {
        echo "<li>$dish</li>";
    }
}
echo "</ul>";


// Assocs Array
$favDishesAssoc = [
    "Pizza" => "Italian food",
    "Burger" => "Fast food",
    "Tacos" => "Mexican food",
    "Sushi" => "Japanese food",
    "Cevapi" => "Turkish food"
];

echo $favDishesAssoc["Cevapi"];
echo "<br>";
print_r($favDishesAssoc);
echo "<br>";

foreach ($favDishesAssoc as $dish => $description) {
    echo "<li>$dish - $description</li>";
}

// Multidimensional associative arrays
$favDishesAssocMulti = [
    "Pizza" => ["pindas", "kip", "noodles", "soy sauce"],
    "Burger" => ["cheese", "lettuce", "tomato", "peperoni"],
    "Tacos" => ["shell", "cheese", "meat"],
    "Sushi" => ["nuri", "cucumber", "fish", "rice"],
    "Cevapi" => ["meat", "spices"]
];

// How do we iterate?
 foreach ($favDishesAssocMulti as $dish => $ingredients) {
     echo "<h2>$dish</h2>"."<hr>";
     echo "<ul>";
     foreach ($ingredients as $ingredient) {
         echo "<li>$ingredient</li>";
     }
     echo "</ul>";
 }

 // functions always precede the function keyword
 function calculate ($a, $b) {
     return $a + $b;
 }

 function calculateVoid ($a, $b) {
    echo $a + $b;
}

calculateVoid(2, 3); // show 5
echo "<br>";

$result = calculate(1, 4); // show 5
echo $result; // show 5
echo "<br>";

// function with optional parameters
// default value for VAT is false
function calcTotal ($amount, $vat = false) {
    if ($vat) {
        return $amount * (1 + ($vat/100));
    } else {
        return $amount;
    }
}

$inclVAT = calcTotal(100, 21);
echo $inclVAT;
?>

<!-- HTML -->
<form action="register.php" method="post">
    <input type="text" name="firstName" placeholder="Your name">
    <input type="email" name="email" placeholder="Your email">
    <input type="number" name="phone" placeholder="Your phone number">
    <input type="number" name="age" placeholder="Your age">
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>

<!-- Extend this form with email, phone, age
on the register page.. if younger than 16: show no booze
between 16 and 18: show only beer
older than 18: show beer and liquors
light design - palm tree
try to embed the code into an existing dashboard template -->
