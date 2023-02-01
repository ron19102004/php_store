<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/src/services/user.service.php');
class UserController{
    private $userService;
    function __construct(){
        $this->userService = new UserService();
    }
    public function login($email, $password){
        $user = $this->userService->findByEmail($email);
        if(!$user) return false;
        if($user->password !== $password) return false;
        return true;
    }
}