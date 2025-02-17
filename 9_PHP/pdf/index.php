<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <form action="printpagina.php" method="post">
        <input type="text" name="orgName" placeholder="Naam organisatie">
        <input type="text" name="mentor" placeholder="Naam mentor">
        <input type="number" name="ondernemingsnummer" placeholder="Ondernemingsnummer">
        <input type="text" name="adress" placeholder="Adres">
        <input type="number" name="telefoon" placeholder="Telefoonnummer">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="cursistvoornaam" placeholder="Voornaam cursist">
        <input type="text" name="cursistachternaam" placeholder="Achternaam cursist">
        <input type="text" name="docentvoornaam" placeholder="Voornaam docent">
        <input type="text" name="docentachternaam" placeholder="Achternaam docent">
        <input type="date" name="aanvangDatum" placeholder="Aanvang datum">
        <input type="date" name="eindDatum" placeholder="Eind datum">
        <input type="number" name="stageTijd" placeholder="Stage tijd">
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>
</body>

</html>