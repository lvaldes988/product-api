<?php
// if the form was submitted
if ($_POST) {
    // include core configuration
    include_once('../../config/core.php');
    // include database connection
    include_once('../../config/database.php');
    // product object
    include_once('../../objects/product.php');
    // create class instance of database
    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);
    // set product property values
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->description = $_POST['description'];
    $product->category_id = $_POST['category_id'];
    $product->id = $_POST['id'];
    
    // create the product
    echo $product->update($product->id) ? "true" : "false";
}