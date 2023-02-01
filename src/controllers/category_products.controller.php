<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/src/services/category_products.service.php');
class CategoryProductController{
    private $categoryService;
    function __construct()
    {
     $this->categoryService = new CategoryProductService();   
    }
    public function findAll(){
        return $this->categoryService->findAll();
    }
}