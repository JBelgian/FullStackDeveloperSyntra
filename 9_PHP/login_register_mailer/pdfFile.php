<?php
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

function printToPDF($user)
{
    // variables
    $username = $user['name'];
    $useremail = $user['email'];
    $userstatus = $user['status'] == 1 ? 'Active' : 'Inactive';
    $userdate = $user['date'];

    // Path to the local image
    $imagePath = 'images/logoweb.png';

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
    <h1>User details</h1>

    Username: ' . $username . '<br>
    Email: ' . $useremail . '<br>
    Status: ' . $userstatus . '<br>
    Date created: ' . $userdate . '
</body>
</html>');

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
}
