<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/src/services/cart.service.php');
class CartController{
    private $cartService;
    function __construct(){
        $this->cartService = new CartService();
    }
    public function findByIdUser($id_user){
        return $this->cartService->findByIdUser($id_user);
    }
}