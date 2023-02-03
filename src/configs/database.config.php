<?php
class DatabaseConfig
{
    private $DATABASE_NAME = "database_project";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $SERVER_NAME = "localhost";
    private $connect;
    function __construct(){}
    public function getDataSource(){
        $this->connect = null;
        try {
            $this->connect = new PDO(
                "mysql:host=$this->SERVER_NAME;
                            dbname=$this->DATABASE_NAME",
                $this->USERNAME,
                $this->PASSWORD
            );
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($this->connect == null)  echo "< ERROR DATABASE CONNECTION >";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->connect;
    }
    public function closeConnection(){
        if ($this->connect !== null) {
            $this->connect = null;
        }
    }
}
