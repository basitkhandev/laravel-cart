<?php


namespace App\Repositories\Models;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(){
        return Product::all();
    }
}
