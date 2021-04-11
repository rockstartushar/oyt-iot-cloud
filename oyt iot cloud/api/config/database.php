<?php
// used to get mysql database conection
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "test";
    private $username = "root";
    private $password = "";
    public $con;
 
    // get the database connection
    public function getConnection(){
        $this->con = null;
        try{
            $this->con = new PDO("mysqli:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Conection error: " . $exception->getMessage();
        }
        return $this->con;
    }
}
?>