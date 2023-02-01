<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/src/configs/database.config.php");
include(realpath($_SERVER["DOCUMENT_ROOT"])."/src/models/user.model.php");
class UserService{
    private $connect;
    private $db;
    function __construct(){
        $this->db = new DatabaseConfig();
    }
    public function create(UserModel $user){
        $this->connect = $this->db->getDataSource();
        try {
            $has_user = $this->findByEmail($user->email);
            if(!$has_user) {
                $sql = "insert into users(email, password) values (?, ?)";
                $stmt = $this->connect->prepare($sql);
                $stmt->execute([$user->email,$user->password]);
            }
        } catch (PDOException $e){
            echo "Error creating database".$e->getMessage();
        }
        $this->db->closeConnection();
    }
    public function findByEmail($email){
        $this->connect = $this->db->getDataSource();
        $u = null;
        try {
            $sql = "select * from users where email = ? and deleted = 0";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll();
            foreach($user as $row){
                $u = new UserModel($row['id'],$row['email'],$row['password']);
            }
        } catch (PDOException $e){
            echo "Error creating database".$e->getMessage();
        }
        $this->db->closeConnection();
        return $u;
    }
    public function delete($id){
        $this->connect = $this->db->getDataSource();
        try {
            $sql = "update users set deleted = 0 where id =?";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e){
            echo "Error deleting database".$e->getMessage();
        }
        $this->db->closeConnection();
    }
}