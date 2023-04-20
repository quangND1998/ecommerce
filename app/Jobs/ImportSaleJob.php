<?php

namespace App\Jobs;

use App\Models\SaleItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Order\Entities\OrderItem;
use Modules\ProductCategory\Entities\Product;
use App\SaleService\MoneyDiscount;
use App\SaleService\PercentDiscount;

class ImportSaleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected  $product, $sale;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product, $sale)
    {
        $this->product = $product;
        $this->sale = $sale;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        if ($this->sale->type == 'product') {
            $product = Product::where('SKU', $this->product['sku'])->first();

            if ($product) {
                $item = SaleItem::where('sale_id', $this->sale->id)->where('product_id', $product->id)->first();
                $sale_price = $product->cost - ($product->cost * $this->product['triet_khau']) / 100;
                if ($item) {

                    if ($this->sale->unit == "%") {
                        PercentDiscount::updateItem($item, $product, $this->product['triet_khau']);
                    } else {
                        MoneyDiscount::updateItem($item, $product, $this->product['triet_khau']);
                    }

                    // $item->product_id = $product->id;
                    // $item->sale_id =  $this->sale->id;
                    // $item->discount = $this->product['triet_khau'];
                    // $item->price = $product->cost;
                    // $item->price_sale = $sale_price;
                    // $item->save();
                } else {

                    if ($this->sale->unit == "%") {
                        PercentDiscount::createItem($this->sale, $product, $this->product['triet_khau']);
                    } else {
                        MoneyDiscount::createItem($this->sale, $product, $this->product['triet_khau']);
                    }
                }

                // $item = new SaleItem();
                // $item->product_id = $product->id;
                // $item->sale_id =  $this->sale->id;
                // $item->discount = $this->product['triet_khau'];
                // $item->price = $product->cost;
                // $item->price_sale = $sale_price;
                // $item->save();
            }
        } else {

            $product = Product::where('SKU', $this->product['sku'])->first();

            if ($product) {
                $item = SaleItem::where('sale_id', $this->sale->id)->where('product_id', $product->id)->first();

                $sale_price = $product->cost - ($product->cost * $this->sale->discount) / 100;
                if ($item) {
                    if ($this->sale->unit == "%") {
                        PercentDiscount::updateItem($item, $product, $this->sale->discount);
                    } else {
                        MoneyDiscount::updateItem($item, $product, $this->sale->discount);
                    }
                    // $item->product_id = $product->id;
                    // $item->sale_id =  $this->sale->id;
                    // $item->discount = $this->sale->discount;
                    // $item->price = $product->cost;
                    // $item->price_sale = $sale_price;
                    // $item->save();
                } else {

                    if ($this->sale->unit == "%") {
                        PercentDiscount::createItem($this->sale, $product, $this->sale->discount);
                    } else {
                        MoneyDiscount::createItem($this->sale, $product, $this->sale->discount);
                    }
                    // $item = new SaleItem();
                    // $item->product_id = $product->id;
                    // $item->sale_id =  $this->sale->id;
                    // $item->discount = $this->sale->discount;
                    // $item->price = $product->cost;
                    // $item->price_sale = $sale_price;
                    // $item->save();
                }
            }
        }
    }
}
