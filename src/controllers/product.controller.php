<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/src/services/product.service.php');
class ProductController{
    private $productService;
    function __construct()
    {
     $this->productService = new ProductService();   
    }
    public function findAll(){
        return $this->productService->findAll();
    }
    public function findByCategory($id_category){
        return $this->productService->findByCategory($id_category);
    }
}
$u = new ProductController();
print_r($u->findAll());