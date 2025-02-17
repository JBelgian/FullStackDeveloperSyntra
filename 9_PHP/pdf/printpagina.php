<?php
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// Path to the local image
$imagePath = 'logoweb.png';

// Read the image file and encode it to base64
$imageData = base64_encode(file_get_contents($imagePath));

// Format the base64 string for use in HTML
$base64Image = 'data:image/png;base64,' . $imageData;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml('<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyntraPXL Stageovereenkomst</title>
</head>
<body>
    <img src="' . $base64Image . '" alt="SyntraPXL logo" width="150">
    <h1>SyntraPXL Stageovereenkomst</h1>
    <h2>Naam opleiding: FullStack</h2>

    <div>De ondergetekenden, <br>
        1. Stageplaats/werkplek: <br>' .
    $_POST['orgName'] . '(naam organisatie) <br>
        Vertegenwoordigd door \'Mentor\' <br>
        ' . $_POST['mentor'] . ' (naam mentor) <br>
        Ondernemingsnummer: <br>
        ' . $_POST['ondernemingsnummer'] . ' (ondernemingsnummer) <br>
        Adres: <br>
        ' . $_POST['adress'] . ' (adres) <br>  
        Telefoonnummer: <br>
        ' . $_POST['telefoon'] . ' (telefoonnummer) <br>
        Email: <br>
        ' . $_POST['email'] . ' (email) <br>
        <br>
        2. \'SyntraPXL\', vertegenwoordigd door de campusmanager. <br>
        3. \'Cursist\' (voornaam + achternaam): <br>
        ' . $_POST['cursistvoornaam'] . ' ' . $_POST['cursistachternaam'] . ' <br>
        4. \'Docent\' (voornaam + achternaam): <br>
        ' . $_POST['docentvoornaam'] . ' ' . $_POST['docentachternaam'] . ' <br>
        KOMEN HET VOLGENDE OVEREEN:
    </div>
    <div>
        <h3>Artikel 1. - Voorwerp</h3>
        De stage of het werkplekleren is een verplicht onderdeel van de opleiding gevolgd bij SyntraPXL en
        heeft tot doel de cursist professionele praktijkervaring te laten opdoen in het kader van deze
        opleiding. De cursist doorloopt de stage of het werkplekleren bij de hierboven vermelde
        stageplaats/werkplek.
        De stageplaats/werkplek aanvaardt de cursist, ingeschreven bij SyntraPXL, op te nemen voor de in
        artikel 2 beschreven stageperiode.
        De stage of het werkplekleren doet geen arbeidsovereenkomst ontstaan tussen de cursist en de
        stageplaats/werkplek. Er is geen sprake van arbeidsprestaties. <br>
        <h3>Artikel 2. - Aanvang en duur</h3>
        De periode vangt aan op' . $_POST['aanvangDatum'] . ' en eindigt op ' . $_POST['eindDatum'] . '. De stage of het werkplekleren
        bestaat uit minstens ' . $_POST['stageTijd'] . ' te presteren uren. De stage of het werkplekleren kan pas
        aanvangen na registratie van dit contract door SyntraPXL. <br>
        <h3>Artikel 3. - Plaats en dienstregeling</h3>
        De cursist verricht zijn/haar stage –of werkplekactiviteiten op de locatie van de stageplaats/werkplek
        (tenzij anders meegedeeld aan SyntraPXL) en volgens de in artikel 2 overeengekomen dienstregeling. <br>
        <h3>Artikel 4. - Onbezoldigd karakter</h3>
        De stage is onbezoldigd. <br>
        Wel ontvangt de cursist van de stageplaats/werkplek een vergoeding voor eventuele kosten die hij/zij
        moet maken om aan de stage/werkplekverplichting te voldoen en die overeenstemt met de werkelijk
        gemaakte kosten.
    </div>
</body>
</html>');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
