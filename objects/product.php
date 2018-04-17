<?php
class Product {

 //database connection and table name
private $conn;
private $table_name = 'products';

//object properties

public $id;
public $name;
public $price;
public $description;
public $category_id;
public $timestamp;


 public function __construct($db) {
    $this->conn = $db;
 }

 public function create(){
    try{
        //insert query
        $query = "INSERT INTO products
        SET name=:name, description=:description, price=:price, 
        category_id=:category_id, created=:created";
        
        $stmt =$this->conn->prepare($query);

        //sanitize hml

        $name = htmlspecialchars(strip_tags($this->name));
        $description = htmlspecialchars(strip_tags($this->description));
        $price = htmlspecialchars(strip_tags($this->price));
        $category_id = htmlspecialchars(strip_tags($this->category_id));

        //bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stamt->bindParam(':price', $price);
        $stamt->bindParam(':category_id', $category_id);

        //we need the created variable to know where the record was creatted
        //also, to comply with strict standars: onl variables should be passed
        //by reference

        $create = date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
        
        //execute
            if ($stmt->execute()) {
                return true;

            }else {
                return false;
            }
     } //show error if any
    catch(PDOException $exception){
        die('error: ' . $exception->getMessage());
    }
 }

 public function readAll() {
    //select all data

    $query = "SELECT p.id, p.name, p.price, c.name, as category_name FROM "
    .$this->table_name . "
    p LEFT JOIN categories c
    ON p.category_id = c.id
    ORDER BY id DESC";


    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    $results = $srmt->fetchAll(PDP::FETCH_ASSOC);

        return json_encode($results);
    }

    public function readOne() {
        //select data 
        $query = "SELECT p.id, p.name, p.price, c.name, as category_name FROM "
        .$this->table_name . "
        p LEFT JOIN categories c
        ON p.category_id = c.id
        WHERE p.id = :id";

        // prepare the query for execution

        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($this->id));
        $stmt->bind_param(':id', $id);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($results);
    }
}