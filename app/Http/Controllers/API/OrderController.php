<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Requests\OrderRequestValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\OrderHistoryResource;

class OrderController extends Controller
{
    private $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function index()
    {
        try {
            return OrderHistoryResource::collection($this->orderRepo->getUserorder(Auth::user()->id));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something went wrong. Pleas try again later',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(OrderRequestValidation $request): JsonResponse
    {
        try {
            $order = $this->orderRepo->createOrder($request->items, Auth::user()->id);
            return response()->json(['message' => 'Order has been Placed Successfully', 'order' => $order->id]);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something went wrong. Pleas try again later',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
