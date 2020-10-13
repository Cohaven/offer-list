<?php

namespace App\Base;

interface OfferInterface {
    public function getId();
    public function getName();
    public function getImageUrl();
    public function getCashBack();

    public function setId($value);
    public function setName($value);
    public function setImageUrl($value);
    public function setCashBack($value);
}