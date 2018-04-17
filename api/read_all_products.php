<?php 

//include core configuration
include_once('../config/core.php');

//include database connectio

include_once('../config/database.php');

//product object

include_once('../objects/product,php');

//class instance

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

//read all the products
$results = $product->readAll();

//output in json format

echo $results;