<?php

namespace App\SaleService;

use App\Models\SaleItem;
use App\SaleService\SaleInterface;
use Modules\Order\Entities\OrderItem;

class MoneyDiscount implements SaleInterface
{

    public static function price_sale($price, $discount)
    {
        return $price - $discount;
    }

    public static function updateItem($item, $product, $discount)
    {
        $item->update([
            'price' => $product->cost,
            'discount' => $discount,
            'price_sale' => ($discount >= $product->cost) ? $product->cost : $product->cost - $discount
        ]);
    }

    public static function createItem($sale, $product, $discount)
    {
        SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => $product->id,
            'price' => $product->cost,
            'discount' => $discount,
            'price_sale' => ($discount >= $product->cost) ? $product->cost : $product->cost - $discount
        ]);
    }
}
