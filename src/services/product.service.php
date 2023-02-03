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
    public function navigate($from){
        $this->connect = $this->db->getDataSource();
        $list_products= array();
        try {
            $sql = "select * from products where deleted = 0 order by price asc limit $from,30;";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $products= $stmt->fetchAll();
            foreach( $products as $row){
                $product = new ProductModel(
                    $row["id"],
                    $row["name"],
                    $row["slug"],
                    $row["price"],
                    $row["description"],
                    $row["url_img"],
                    $row["id_category"]
                );
                array_push($list_products,$product);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->closeConnection();
        return $list_products;
    }
    public function findAll(){
        $this->connect = $this->db->getDataSource();
        $list_products= array();
        try {
            $sql = "select * from products where deleted = 0 order by price asc;";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $products= $stmt->fetchAll();
            foreach( $products as $row){
                $product = new ProductModel(
                    $row["id"],
                    $row["name"],
                    $row["slug"],
                    $row["price"],
                    $row["description"],
                    $row["url_img"],
                    $row["id_category"]
                );
                array_push($list_products,$product);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->closeConnection();
        return $list_products;
    }
    public function findByCategory($id_category){
        $this->connect = $this->db->getDataSource();
        $list_products= array();
        try {
            $sql = "select * from products where id_category = ? and deleted = 0 order by price asc;";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([$id_category]);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $products= $stmt->fetchAll();
            foreach( $products as $row){
                $product = new ProductModel(
                    $row["id"],
                    $row["name"],
                    $row["slug"],
                    $row["price"],
                    $row["description"],
                    $row["url_img"],
                    $row["id_category"]
                );
                array_push($list_products,$product);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->closeConnection();
        return $list_products;
    }
}