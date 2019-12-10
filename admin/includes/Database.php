<?php

require_once("config.php");
class Database
{

    /* variabelen van het object(class)*/
    public $connection;
    /* default constructor. Alle code tussen
    curly brackets wordt uitgevoerd bij aanroepen
    van het object(class)*/
    function __construct(){
        $this->open_db_connection();

    }

    /**methodes**/
    /*databaseconnectie**/
    public function open_db_connection(){
       $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);



       if(mysqli_connect_errno()){
           die("Database connection mislukt" .mysqli_error());
       }
       
    }
    /*queries**/
    public function confirm_query($result){
        if(!$result){
            die("query kon niet worden uitgevoerd" . $this->connection->error);
        }
    }

    public function query($sql){
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    public function escape_string($string){
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }

    public function the_insert_id(){
        return mysqli_insert_id($this->connection);
    }

}
$database = new Database();

?>
