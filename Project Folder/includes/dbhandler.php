<?php

$servename = "localhost";
$DBuname = "phpmyadmin";
$DBPass = "Sadiejoe73";
$DBname = "cs230_Project";

$conn = mysqli_connect($servename, $DBuname, $DBPass, $DBname);

if (!$conn) {
    die("Connection failed...".mysqli_connect_error());
    
}

