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
class ExportProducts implements WithMapping, WithHeadings, FromCollection
{
    use Exportable;

     protected $attribute;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }
 


    
    public function collection()
    {
        return Product::get();
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
            dd($attribute);
            if (collect($this->attributes)->contains($attribute->name)) {
                
                $key = array_search($attribute->name, $this->attributes); 
                if ($key !== false) {
                    $row[$key] = $value->value;
                    // when found
                } else {
                   
                    $row[] =null;
                    // do different stuff
                    // when not found
                }
               
                
            }
            else{
             
                $key = array_search($attribute->name, $this->attributes); 
                dd('a');
            }
          
            // array_push($this->attributes,$attribute->name);
            // array_push($row,$value->value);
          
        }
        // dd($row);
        // dd($this->headings());
        // if($this->headings()){
        //     return ;
        // }
 
        return $row;
    }
}
