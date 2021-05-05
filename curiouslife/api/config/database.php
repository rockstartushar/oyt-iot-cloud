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
// CREATE TABLE `feeds` (
//     `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     `author` varchar(255) DEFAULT NULL,
//     `author-detail` varchar(255) DEFAULT NULL,
//     `title` varchar(255) NOT NULL,
//     `slug` varchar(255) NOT NULL UNIQUE,
//     `views` int(11) NOT NULL DEFAULT '0',
//     `image` varchar(255) NOT NULL,
//     `body` text NOT NULL,
//     `published` tinyint(1) NOT NULL,
//     `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//    ) ENGINE=InnoDB DEFAULT CHARSET=latin1
?>