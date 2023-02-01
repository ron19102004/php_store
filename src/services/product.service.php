<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/src/configs/database.config.php");
include(realpath($_SERVER["DOCUMENT_ROOT"])."/src/models/product.model.php");
class ProductService{
    private $connect;
    private $db;
    function __construct()
    {
        $this->db = new DatabaseConfig();
    }
    public function findAll(){
        $this->connect = $this->db->getDataSource();
        $products= array();
        try {
            $sql = "select * from products where deleted = 0 order by price asc;";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $products= $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->closeConnection();
        return $products;
    }
    public function findByCategory($id_category){
        $this->connect = $this->db->getDataSource();
        $products= array();
        try {
            $sql = "select * from products where id_category = ? and deleted = 0 order by price asc;";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([$id_category]);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $products= $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->closeConnection();
        return $products;
    }
}