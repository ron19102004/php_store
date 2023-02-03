<?php
class CategoryProductModel{
    public $id;
    public $name;
    public $slug;
    public $description;
    public $url_img;
    function __construct($id, $name, $slug, $description, $url_img){
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->url_img = $url_img;
    }
}