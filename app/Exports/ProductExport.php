<?php

namespace App\Exports;

use Attribute;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Modules\ProductCategory\Entities\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
class ProductExport implements WithMapping, WithHeadings, FromCollection, ShouldQueue
{
    use Exportable;

     protected $attribute;
     protected $array;

    public function __construct($attributes, $array)
    {
        $this->attributes = $attributes;
        $this->array = $array;
    }
 


    
    public function collection()
    {
   
        return Product::whereIn('category_id', $this->array)->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return $this->attributes;
    }

    public function map($product): array
    {
      
        $row= [
            $product->SKU,
            $product->name,
            $product->category->name,
            $product->cost,
            $product->price,


        ];
        
        
       foreach($product->values as $value){
            $attribute = $value->attribute;
            if (collect($this->attributes)->contains($attribute->name)) {
                
                $key = array_search($attribute->name, $this->attributes); 
                if ($key !== false) {
                    $row[$key] = $value->value;
                    // when found
                } else {
                    // dd('a');
                    // do different stuff
                    // when not found
                }
               
                
            }
            // else{
            //     dd('b');
            //     $key = array_search($attribute->name, $this->attributes); 
               
            // }
          
            // array_push($this->attributes,$attribute->name);
            // array_push($row,$value->value);
          
        }
    
      
 
        return $row;
    }
}
