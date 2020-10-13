<?php

namespace App\Base;

interface OfferRepositoryInterface {
    public function getOffers(string $sort_by);
}