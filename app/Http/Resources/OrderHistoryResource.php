<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $items = $this->items->map(function ($item) {
            $subtotal = $item->quantity * $item->product->price;
            return [
                'product_name' => $item->product->name,
                'quantity'     => $item->quantity,
                'price'        => $item->product->price,
                'subtotal'     => $subtotal,
            ];
        });
        $total = $items->sum('subtotal');
        return [
            'id'         => $this->id,
            'name'       => $this->user->name ?? '',
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'items'      => $items,
            'total'      => $total,
        ];
    }
}
