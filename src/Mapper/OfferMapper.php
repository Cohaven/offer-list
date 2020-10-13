<?php

namespace App\Mapper;
use App\Base\FileAdapterInterface;
use App\Base\OfferMapperInterface;
use App\Domain\Offer;

class OfferMapper implements OfferMapperInterface {
    const SOURCE_ID_FIELD = 'offer_id';
    const SOURCE_NAME_FIELD = 'name';
    const SOURCE_IMAGE_URL_FIELD = 'image_url';
    const SOURCE_CASH_BACK_FIELD = 'cash_back';

    private $adapter;

    public function __construct(FileAdapterInterface $adapter) {
        $this->adapter = $adapter;
    }

    public function findAll(string $key, string $file, string $sort_by = null) {
        $rows = $this->adapter->find($key, $file, $sort_by);

        return $this->createOfferCollection($rows);
    }

    public function createOfferCollection(array $rows) {
        $collection = [];

        foreach ($rows as $key => $data) {
            $offer = $this->createOffer($data);
            $collection[] = $offer;
        }

        return $collection;
    }

    public function createOffer(array $data) {
        $offer = new Offer();

        $offer->setId($data[self::SOURCE_ID_FIELD]);
        $offer->setName($data[self::SOURCE_NAME_FIELD]);
        $offer->setImageUrl($data[self::SOURCE_IMAGE_URL_FIELD]);
        $offer->setCashBack($data[self::SOURCE_CASH_BACK_FIELD]);

        return $offer;
    }
}