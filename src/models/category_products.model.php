<?php
class CategoryProductModel{
    private $id;
    private $name;
    private $slug;
    private $description;
    private $url_img;
    function __construct($id, $name, $slug, $description, $url_img){
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->url_img = $url_img;
    }
}