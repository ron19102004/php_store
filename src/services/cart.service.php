<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/src/configs/database.config.php");
include(realpath($_SERVER["DOCUMENT_ROOT"])."/src/models/cart.model.php");
class CartService{
    private $connect;
    private $db;
    function __construct()
    {
        $this->db = new DatabaseConfig();
    }
    public function findByIdUser($id_user){
        $this->connect = $this->db->getDataSource();
        $carts= array();
        try {
            $sql = "select * from carts where id_user = ? and deleted = 0;";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([$id_user]);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $carts= $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->closeConnection();
        return $carts;
    }
}