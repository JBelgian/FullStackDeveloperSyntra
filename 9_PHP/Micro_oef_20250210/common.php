<?php
function exampleFunction() {
    return "Hello world, common function works";
}

function showBeDate() {
    $months = ['januari','februari','maart','april','mei','juni','juli','augustus','september','oktober','november','december'];
    $days = ['zondag','maandag','dinsdag','woensdag','donderdag','vrijdag','zaterdag'];

    // access the values from the array using the index
    $month = $months[date('n')-1];
    $day = date('j');
    $dayOfWeek = $days[date('w')];
    $year = date('Y');
    return $dayOfWeek.' '.$day.' '.$month.' '.$year;
}