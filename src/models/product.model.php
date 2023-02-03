<?php
class ProductModel{
    public $id;
    public $name;
    public $slug;
    public $price;
    public $description;
    public $url_img;
    public $id_category;
    function __construct($id, $name, $slug, $price, $description, $url_img, $id_category){
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->price = $price;
        $this->description = $description;
        $this->url_img = $url_img;
        $this->id_category = $id_category;
    }
}