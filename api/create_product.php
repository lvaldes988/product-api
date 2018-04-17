<?php 
//if the form was sumitted
if ($_POST) {

//include core configuration
include_once('../config/core.php');

//include database connectio

include_once('../config/database.php');

//product object

include_once('../objects/product,php');

//class instance

$database = new Database();
$db = $database->getConnection();
$product = new Product($db

//set product property values
$product->name = $_post['name'];
$product->price = $_post['price'];
$product->description = $_post['description'];
$product->category_id = $_post['category_id'];

//create the product
echo $product->create() ? "true" : "false"
}