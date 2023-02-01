<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/src/configs/database.config.php");
include(realpath($_SERVER["DOCUMENT_ROOT"])."/src/models/user_details.model.php");
class UserDetailsService{
    private $connect;
    private $db;
    function __construct(){
        $this->db = new DatabaseConfig();
    }
    public function findByIdUser($id){
        $this->connect = $this->db->getDataSource();
        $user_details = null;
        try {
            $sql = "select * from profile_users where id = ?";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user_details_db = $stmt->fetchAll();
            foreach($user_details_db as $row){
                $user_details = new UserDetailsModel(
                    $row["id"],
                    $row["id_user"],
                    $row["first_name"],
                    $row["last_name"],
                    $row["url_img_profile"],
                    $row["address"],
                    $row["phone"]
                );
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->closeConnection();
        return $user_details;
    }
}