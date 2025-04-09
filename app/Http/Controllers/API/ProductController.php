<?php

namespace App\Http\Controllers\API;

use \App\Http\Controllers\API\ApiController;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ProductController extends ApiController
{
    private $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index(): JsonResponse
    {
        return $this->safeCall(function () {
            return response()->json($this->productRepo->all());
        });
    }
}
