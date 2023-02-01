<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/src/services/user_details.service.php');
class UserDetailsController{
    private $userDetailsService;
    function __construct()
    {
     $this->userDetailsService = new UserDetailsService();   
    }
    public function findByIdUser($userId){
        return $this->userDetailsService->findByIdUser($userId);
    }
}