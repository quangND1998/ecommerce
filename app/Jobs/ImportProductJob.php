<?php

namespace App\Jobs;

use Attribute;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\ProductCategory\Entities\AttributeValue;
use Modules\ProductCategory\Entities\CategoryProduct;
use Modules\ProductCategory\Entities\Product;

class ImportProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $category, $category_child, $attributes, $product;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($category, $category_child, $attributes, $product)
    {
        $this->category = $category;
        $this->category_child = $category_child;
        $this->attributes = $attributes;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
      
        $keys = $this->product->keys();

        /* 
        * Tạo mới sản phẩm nếu ko có catgory_child thì sẽ gán vào cha 
        */

        $product = new Product();
        $product->name =  $this->product['ten_san_pham'];
        $product->SKU =  $this->product['sku'];
        $product->category_id =   $this->category_child ? $this->category_child->id : $this->category->id;
        $product->cost = $this->product['gia_ban'];
        $product->price = $this->product['gia_goc'];
        $product->status =  true;

        $product->active = true;
        $product->auto_sold = true;
        $product->save();
 
        $values = [];
        foreach ($this->attributes as $attr) {
            // dd($attr->slug);
            /* 
            * Check xem đã tồn tại thuộc tính chưa 
            */
            if ($keys->contains($attr->slug)) {
                // $value = $attr->values()->

                /* 
            * Nếu đã tồn tại thuộc tính , tìm kiếm value của thuộc tính đó đã được tạo hay chưa 
            */
                $exist_value = $attr->values->firstWhere('value', $this->product[$attr->slug]);
                if ($exist_value) {
                    $values[] = $exist_value;
                    
                } else {

                        /* 
            * Nếu chưa tồn tại thì tạo mới value đó 
            */
                    $new_value = new AttributeValue();
                    $new_value->value =  $this->product[$attr->slug];
                    $new_value->attribute_id = $attr->id;
                    $new_value->save();


                    $values[] = $new_value;
                }
            }
        }
        // dd(collect($values)->pluck('id'));
        if (count($values) > 0) {
            $product->values()->sync(collect($values)->pluck('id'));
        }
    }
}
