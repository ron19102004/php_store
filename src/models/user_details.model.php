<?php
class UserDetailsModel{
    public $id;
    public $id_user;
    public $first_name;
    public $last_name;
    public $url_img_profile;
    public $address;
    public $phone;
    function __construct($id, $id_user, $first_name, $last_name, $url_img_profile, $address, $phone){
        $this->id = $id;
        $this->id_user = $id_user;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->url_img_profile = $url_img_profile;
        $this->address = $address;
        $this->phone = $phone;
    }
}