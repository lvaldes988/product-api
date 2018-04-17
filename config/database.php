<?php
class Database {
    //specify your own db credential

    private $host ='localhost';
    private $db_name = 'php_react_crud';
    private $username = 'root';
    private $password ='';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql='. $this->host. ';dbname' . $this->dn_name, $this->username,
            $this->password);
        }   catch(PDDException $exception) {
                echo 'connection error:' . $exception->getMessage();
        }
        return $this->conn;
    }
}