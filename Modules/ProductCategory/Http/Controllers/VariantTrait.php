<?php
namespace Modules\ProductCategory\Http\Controllers;

use Modules\ProductCategory\Entities\Product;

trait VariantTrait
{
    public function generateVariant(array $input): array
    {
        if (!count($input)) return [];

        $result = [[]];

        foreach ($input as $key => $values) {
            $append = [];
            foreach ($values as $value) {
                foreach ($result as $data) {
                    $append[] = $data + [$key => $value];
                }
            }
            $result = $append;
        }

        return $result;
    }

    public function saveVariant(array $variants, Product $product)
    {
        $skus = $product->skus()->createMany(array_fill(0, count($variants), []));

        $variantOptions = [];

        foreach ($skus as $index => $sku) {
            foreach ($variants[$index] as $optionValue) {
                $variantOptions[] = [
                    'product_id' => $product->id,
                    'sku_id' => $sku->id,
                    'options_id' => $optionValue['options_id'],
                    'option_value_id' => $optionValue['id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        $product->variants()->insert($variantOptions);
    }
}