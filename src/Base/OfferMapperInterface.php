<?php

namespace App\Base;

interface OfferMapperInterface {
    public function __construct(FileAdapterInterface $adapter);
    public function findAll(string $key, string $file, string $sort_by = null);
    public function createOfferCollection(array $rows);
    public function createOffer(array $row);
}