<?php

namespace App\SaleService;

use App\Models\SaleItem;
use App\SaleService\SaleInterface;

class PercentDiscount implements SaleInterface
{

    public static function price_sale($price, $discount)
    {
        return $price - ($price * $discount) * 100;
    }

    public static function updateItem($item, $product, $discount)
    {
      
        $item->update([
            'price' => $product->cost,
            'discount' => $discount,
            'price_sale' => $product->cost - ($product->cost * $discount) / 100
        ]);
    }

    public static function createItem($sale, $product, $discount)
    {
        SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => $product->id,
            'price' => $product->cost,
            'discount' => $discount,
            'price_sale' => $product->cost - ($product->cost * $discount) / 100
        ]);
    }
}
