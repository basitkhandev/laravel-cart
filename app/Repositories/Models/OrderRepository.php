<?php


namespace App\Repositories\Models;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use DB;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder (array $items, $user_id)
    {
        $order = Order::create(['user_id' => $user_id]);
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ]);
        }
        return $order;
    }

    public function getUserorder ($user_id)
    {
        $orders = Order::with(['items.product'])
            ->where('user_id', auth()->id())
            ->get();
        return $orders;

    }
}
