<?php
class CartModel{
    private $id;
    private $id_user;
    private $created_at;
    private $update_at;
    function __construct($id,$id_user,$created_at,$update_at)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->created_at = $created_at;
        $this->update_at = $update_at;
    }
}