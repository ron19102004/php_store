<?php
class UserModel {
    public $id;
    public $email;
    public $password;
    function __construct($id, $email, $password){
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }
    public function getId(){
        return $this->id;
    }
}