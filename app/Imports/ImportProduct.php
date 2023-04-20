<?php

namespace App\Imports;

use App\Jobs\ImportProductJob;
use App\Models\History_Account;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Jobs\ImportUserSale;
use Modules\ProductCategory\Entities\CategoryProduct;

class ImportProduct implements ToCollection, WithHeadingRow, WithChunkReading, SkipsOnError
{
    use Importable, SkipsErrors;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function headingRow(): int
    {
        return 1;
    }
    public function collection(Collection $productCollections)
    {
        // dd($productCollections);
        foreach ($productCollections as $key => $product) {

            $check = $product['danh_muc_san_pham'] ? preg_split("/[\s,>]+/", $product['danh_muc_san_pham']) : null;
       
            if ($check) {

                if (count($check) == 1) {
                    // dd('a');

                    $category = CategoryProduct::with('attributes.values')->where('slug', preg_split("/[\s,>]+/", $product['danh_muc_san_pham'])[0])->first();

                    if ($category->parent_id) {
                        $parent_category  =  CategoryProduct::with('attributes.values')->find($category->parent_id);
                        $category_child = $category;
                    } else {
                        $parent_category = $category;
                        $category_child = null;
                    }
                } elseif (count($check) >= 2) {
                    $parent_category = CategoryProduct::with('attributes.values')->where('slug', preg_split("/[\s,>]+/", $product['danh_muc_san_pham'])[0])->first();
                    $category_child = CategoryProduct::with('attributes.values')->where('slug', preg_split("/[\s,>]+/", $product['danh_muc_san_pham'])[1])->first();
                }
                if ($parent_category || $category_child) {
                    dispatch(new ImportProductJob($parent_category, $category_child, $parent_category->attributes, $product));
                }
            }
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
