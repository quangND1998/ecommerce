<?php

namespace App\SaleService;

interface SaleInterface
{
    public static function price_sale($price, $discount);

    public static function updateItem($item, $product, $discount);

    public static function createItem( $sale, $product, $discount);
}
