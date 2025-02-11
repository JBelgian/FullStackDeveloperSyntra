<?php
// while loop
$x = 1;  
while ($x <= 5) {  
    echo "Dit is poging nummer: $x <br>";  
    $x++;  // Verhoog x met 1  
}  

// for loop
for ($i = 1; $i <= 10; $i++) {  
    echo "Nummer: $i <br>";  
}  

// foreach loop (voor arrays)
$leerlingen = ["Emma", "Noah", "Liam", "Sofia"];  

foreach ($leerlingen as $naam) {  
    echo "Leerling: $naam <br>";  
}  

// do while loop
$y = 10;  
do {  
    echo "Nummer is: $y <br>";  
    $y++;  
} while ($y < 15);  

// continue
for ($i = 1; $i <= 10; $i++) {  
    if ($i == 5) {  
        continue;  
    }  
    echo "Nummer: $i <br>";  
}

// break
for ($i = 1; $i <= 10; $i++) {  
    if ($i == 5) {  
        break;  
    }  
    echo "Nummer: $i <br>";  
}
?>
