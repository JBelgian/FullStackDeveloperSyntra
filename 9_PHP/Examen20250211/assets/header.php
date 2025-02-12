<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    h2 {
      text-align: center;
    }

    table {
      border-collapse: collapse;
      margin: auto;
      width: 50%;
      text-align: center;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f0f0f0;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 10px auto;
      display: block;
      align-items: center;
    }

    button[type="submit"]:hover {
      background-color: #3e8e41;
    }

    .dish-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      width: auto;
    }

    .dish-name {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .dish-details {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin-bottom: 10px;
    }

    .dish-quantity {
      font-size: 14px;
      color: darkgray;
    }

    .dish-time {
      font-size: 14px;
      color: darkgray;
    }
  </style>
</head>

<body>