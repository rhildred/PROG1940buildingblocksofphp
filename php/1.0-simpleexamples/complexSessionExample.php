<?php 

session_start();
$_SESSION["shoppingCart"] = new stdClass();

$_SESSION["shoppingCart"]->peaches = new stdClass();
$_SESSION["shoppingCart"]->peaches->qty = 4;
$_SESSION["shoppingCart"]->peaches->price = 14.95;
$_SESSION["shoppingCart"]->pears = new stdClass();
$_SESSION["shoppingCart"]->pears->qty = 2;
$_SESSION["shoppingCart"]->pears->price = 12.12;

print_r($_SESSION);
?>