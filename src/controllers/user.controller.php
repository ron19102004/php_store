<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/src/services/user.service.php');
class UserController{
    private $userService;
    function __construct(){
        $this->userService = new UserService();
    }
    public function login($email, $password){
        $user = $this->userService->findByEmail($email);
        if(!$user) return null;
        if($user->password !== $password) return null;
        return $user;
    }
}