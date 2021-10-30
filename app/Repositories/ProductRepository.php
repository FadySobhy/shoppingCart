<?php


namespace App\Repositories;

use App\Product;
use App\Repositories\Interfaces\InterfaceProductRepository;

class ProductRepository implements InterfaceProductRepository
{
    public function getAll()
    {
        return Product::query()->with('shipping_rate')->get();
    }

    public function findByID($id)
    {
        return Product::with('shipping_rate')->findOrFail($id);
    }
}
