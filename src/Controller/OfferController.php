<?php

namespace App\Controller;

use App\Repository\OfferRepository;
use \Exception;

class OfferController {
    protected $view;
    protected $repo;

    public function __construct(\Twig\Environment $view, OfferRepository $repo){
        $this->view = $view;
        $this->repo = $repo;
    }

    public function getOffers($request, $response, $args){
        $sort = $request->getQueryParam('sort');

        if($sort != null){
            if($sort == 'name'){
                $offers = $this->repo->getOffers('name');
            } else if($sort == 'cash'){
                $offers = $this->repo->getOffers('cash_back');
            } else {
                $offers = $this->repo->getOffers();
            }
        }

        return $this->view->render('index.html', [
            'offers' => $offers
        ]);
    }
}