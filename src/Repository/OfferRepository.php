<?php

namespace App\Repository;
use App\Base\OfferRepositoryInterface;
use App\Base\OfferMapperInterface;

class OfferRepository implements OfferRepositoryInterface {
    private $offer_mapper;

    public function __construct(OfferMapperInterface $offer_mapper) {
        $this->offer_mapper = $offer_mapper;
    }

    public function getOffers(string $sort_by){
        $offers = $this->offer_mapper->findAll('offers', '../data/c51.json', $sort_by);
        return $offers;
    }
}