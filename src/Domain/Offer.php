<?php

namespace App\Domain;
use App\Base\OfferInterface;

class Offer implements OfferInterface {
    private $id;
    private $name;
    private $image_url;
    private $cash_back;

    //GETTERS
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getImageUrl(){
        return $this->image_url;
    }

    public function getCashBack(){
        return $this->cash_back;
    }

    //SETTERS
    public function setId($value){
        $this->id = $value;
    }

    public function setName($value){
        $this->name = $value;
    }

    public function setImageUrl($value){
        $this->image_url = $value;
    }

    public function setCashBack($value){
        $this->cash_back = $value;
    }
}