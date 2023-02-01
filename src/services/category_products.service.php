<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/src/configs/database.config.php");
include(realpath($_SERVER["DOCUMENT_ROOT"])."/src/models/category_products.model.php");
class CategoryProductService{
    private $connect;
    private $db;
    function __construct()
    {
        $this->db = new DatabaseConfig();
    }
    public function findAll(){
        $this->connect = $this->db->getDataSource();
        $category= array();
        try {
            $sql = "select * from category_products where deleted = 0;";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $cates = $stmt->fetchAll();
            foreach($cates as $row){
                $category_product = new CategoryProductModel(
                    $row["id"],
                    $row["name"],
                    $row["slug"],
                    $row["description"],
                    $row["url_img"]
                );
                array_push($category,$category_product);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->closeConnection();
        return $category;
    }
}