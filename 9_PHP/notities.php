<?php

// connectie maken met db
$conn = mysqli_connect("localhost", "root", "", "schooldb");
    // 1. value localhost is de naam van de host/IP
    // 2. value root is de user die gebruikt wordt om in te loggen
    // 3. value "" is paswoord, huidige db heeft geen paswoord
    // 4. value schooldb is de database naam wat we willen accessen

// nieuwe manier om connectie te maken
$conn = new mysqli("localhost", "root", ""); // $conn = new mysqli("localhost", "root", "", "schooldb"); ook nog altijd gewoon mogelijk
$conn->select_db("schooldb");
    // 1. value localhost is de naam van de host/IP
    // 2. value root is de user die gebruikt wordt om in te loggen
    // 3. value "" is paswoord, huidige db heeft geen paswoord
    // 4. met de select_db("schooldb") gaat we specifieren dat de schooldb is de database naam wat we willen accessen

$var2 = "tekst"; // dit gaat normaal door een input komen, zoals bv een email of paswoord
$var = mysqli_real_escape_string($conn, $var2);
    // mysqli_real_escape_string wordt gebruikt voor een sanitized statement aan te maken
    // 1. value *conn is om connectie te maken naar db
    // 2. value *var2 is om een input mee te geven

$sql = "SELECT * FROM users"; // snel voorbeeld van een SQL query
$result = mysqli_query($conn, $sql);
    // mysqli_query wordt gebruikt om een query uit te voeren op de database
    // 1. value *conn is om connectie te maken naar db
    // 2. value *sql is om een eerder gemaakte query mee te geven wat moet uitgevoerd worden
    // de uitgevoerde query gaat in de variable genaamd $result terug komen

mysqli_num_rows($result);
    // mysqli_num_rows gaat tellen hoeveel records zijn terug gekomen van de uitgevoerde query
    
mysqli_fetch_assoc($result);
    // mysqli_fetch_assoc maakt een associated array van de gevonden resultaten

isset($_SESSION['token']);
    // isset gaat kijken of een variable bestaat of niet
    // in dit voorbeeld kijken we naar of de session token bestaat of niet

header("Location: index.php");
    // header wordt gebruikt om ervoor te zorgen dat er naar een andere pagina wordt gegaan
    // in dit geval zal de user naar de index pagina worden gestuurd

session_start();
    // met dit commando wordt een session gestart, in de session kunnen variablen gestored worden waardoor deze in andere pagina's opgeroepen kunnen worden

$_GET['msg'];
    // met $_GET[] commando gaat er gekeken worden of de variable in de url staat, en wat de message is
    // bijvoorbeeld http://localhost:8000/dashboard.php?msg=updated vindt het terug dat msg er inderdaad instaat en dat de value updated is hiermee kan dan verder een functie worden uitgevoerd

$hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    // password_hash is een ingebouwde php functie die ervoor zorgt dat een variable wordt gehashed volgens een meegegeven hashing algoritme
    // 1. value $password is een geinputte waarde, deze zal gehashed worden en dan als variable $hashedPassword verder gebruikt worden
    // 2. value PASSWORD_BCRYPT is de ingebouwde php encryptie functie/algoritme
    // 3. value ['cost' => 10] is hoeveel keer de eerste value door het algoritme moet gaan, 10 is getest op beste performance en aanvaardbare security

// OOP
// class fruit bijvoorbeeld
class Fruit {
    public $name; // public variable kan overal aangeroepen worden
    protected $color; // protected variable kan aangeroepen worden over overerfde classes, maar niet buiten de class of overerfde class
    private $weight; // private variable kan enkel binnen de huidige class aangeroepen worden
};
    // objecten die zullen gemaakt worden in class fruit zullen 3 eigenschappen hebben nl. name, color, weight
    
// twee manieren om de eigenschappen te zetten
// zonder functie in class
$fruitStuk1 = new Fruit();
    // hierin geven we aan dat we een nieuw fruitStuk1 in willen aanmaken in de class Fruit

$fruitStuk1->name = "Banana";
    // hier zeggen we dus rechtstreeks voor object fruitStuk1 moet de name gezet worden naar Banana
    // $fruitStuk1->color = "yellow"; of $fruitStuk1->weight = "13"; gaan we niet kunnen zetten buiten de class vermits deze geen public, maar protected en private variablen zijn die enkel binnen de class kunnen gebruikt worden

echo $fruitStuk1->name;
    // hiermee wordt de naam van object fruitstuk1 aangeroepen dit kan ook weer via een functie gedaan worden

// binnen de class met een methode (functie)
class Vegies {
    public $name;
    public $color;
    public $weight;

    function set_name($name) { // default public functie
        $this->name = $name;
        // de $this zorgt ervoor dat het meegegeven object wordt gebruikt om de naam ervan te wijzigen
      }

    protected function set_color($color) { // protected functie, enkel in deze en overgeerfde classes (zelfs al is de variable public)
        $this->color = $color;
    }

    protected function set_weight($weight) { // private functie, enkel en alleen in deze class (zelfs al is de variable public)
        $this->weight = $weight;
    }

};
$groente1 = new Vegies();
    // hierin geven we aan dat we een nieuw groente1 in willen aanmaken in de class Vegies
$groente1->set_name('Carrot');
    // hiermee zeggen we dus voor groente1 in class Vegies gaan we de functie set_name gebruiken om het eigenschap name te zetten naar Carrot

var_dump($groente1 instanceof Fruit);
    // met deze functie gaat gecheckt worden of het object groente1 terug te vinden is in de class Fruit, dit gaat een bolean waarde terug geven
    // in ons voorbeeld gaat dit false zijn, want we hebben groente1 in class Vegies gestoken

// constructor en constructor
// door een constructor __construct() functie in te bouwen in de class kan er meteen een eigenschap van een object ingevuld worden
class Drank {
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function __destruct()
    {
        echo "Het drankje {$this->name} is aangemaakt";
    }
}
$drankje1 = new Drank('Cola');
    // hierbij zeggen we dus in class Drank moet object drankje1 aangemaakt worden en de waarde die mee gegeven wordt bij het aanmaken ('Cola') zal de name zijn van het vers aangemaakte object
    // kunnen ook meteen meerdere eigenschappen gezet worden bij het aanmaken, deze moeten dan gewoon ook ingegeven worden in de functie en meegegeven worden bij het aanmaken van een nieuw object

// door een destructor __destruct() functie in te bouwen in de class zal er meteen wanneer het object is aangemaakt iets anders aangeroepen kunnen worden bv laten zien dat het is aangemaakt
    // door de destructor in ons voorbeeld gaat wanneer een object in class Drank wordt aangemaakt, direct geecho'd worden dat het is aangemaakt

// overerving zorgt ervoor dat alle functies en eigenschappen wat in een class bestaat overgekopieerd worden naar een andere class (een soort template)
class Alcohol extends Drank { // hierbij zeggen we dus dat we class Alcohol willen aanmaken, met dezelfde eigenschappen en functies als class Drank
  public function warning() { // functie warning zal ervoor zorgen dat volgende boodschap wordt gedisplayed
    echo "Drank {$this->name} bevat alcohol<br>"; 
  }
}
$adrank1 = new Alcohol("Rum"); // Alles wat zou gebeuren als bij $drankje1 gaat ook hier gebeuren, ook al staat dit niet voluit geschreven in de class Alcohol, dit komt door overerving van class Drank
$adrank1->warning(); // hierbij wordt een bijgemaakte functie in Alcohol aangeroepen, deze bestond nog niet class Drank

