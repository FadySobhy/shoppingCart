<?php


namespace App\Services;

use App\Repositories\Interfaces\InterfaceProductRepository;
use Illuminate\Support\Facades\Session;

class HomeService
{
    private $interfaceProductRepository;

    public function __construct(InterfaceProductRepository $interfaceProductRepository)
    {
        $this->interfaceProductRepository = $interfaceProductRepository;
    }

    public function getData() {
        $products       = $this->interfaceProductRepository->getAll();
        $itemsNumber    = count(Session::get('cart') == null ? [] : Session::get('cart'));

        return [
            'products' => $products,
            'itemsNumber' => $itemsNumber
        ];
    }

    public function addToSession($productID) {
        $product = $this->interfaceProductRepository->findByID($productID);
        Session::push('cart', $product);
    }

}
