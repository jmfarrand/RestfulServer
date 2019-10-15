<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 13/05/2018
 * Time: 20:36
 */
// code is adaptead from https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html
class Database {
    //database credentiels - these will need to be changed depending whether its running on local machine or the server
    //local creidantiels
    /*
    private $host = "localhost";
    private $db_name = "calendar";
    private $username = "test";
    private $password = "test";
    */
    //server creidantiels
    private $host = "commerce3.derby.ac.uk";
    private $db_name = "st100385188";
    private $username = "st100385188";
    private $password = "YYNWxVm";


    //gets the database connecetion
    public function getConenction() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            echo "Error conenctiong to the database: " . $e->getMessage();
        }

        return $this->conn;
    }
}
