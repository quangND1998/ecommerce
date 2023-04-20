<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\ProductCategory\Entities\Attribute;
use Modules\ProductCategory\Entities\CategoryProduct;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('attributes')->count() == 0) {
            $attibutes = [
                [
                    'id' => 1,
                    'name' => 'Sóng giấy',
                    'code' => Str::random(8),
                    'category_product_id' => 1,
                    'idNo' => 5,
                ],
                [
                    'id' => 2,
                    'name' => 'Số lớp',
                    'code' => Str::random(8),
                    'category_product_id' => 1,
                    'idNo' => 5,
                ],
                [
                    'id' => 3,
                    'name' => 'Chiều dài (cm)',
                    'code' => Str::random(8),
                    'category_product_id' => 1,
                    'idNo' => 1,
                ],
                [
                    'id' => 4,
                    'name' => 'Chiều rộng (cm',
                    'code' => Str::random(8),
                    'category_product_id' => 1,
                    'idNo' => 2,
                ],
                [
                    'id' => 5,
                    'name' => 'Chiều cao (cm',
                    'code' => Str::random(8),
                    'category_product_id' => 1,
                    'idNo' => 3,
                ],
                [
                    'id' => 6,
                    'name' => 'Mặt giấy',
                    'code' => Str::random(8),
                    'category_product_id' => 1,
                    'idNo' => 4,
                ],

                // Xốp nổ
                [
                    'id' => 7,
                    'name' => 'Chiều rộng (cm)',
                    'code' => Str::random(8),
                    'category_product_id' => 4,
                ],
                [
                    'id' => 8,
                    'name' => 'Chiều dài (cm)',
                    'code' => Str::random(8),
                    'category_product_id' => 4,
                ],


                // Băng dính
                [
                    'id' => 9,
                    'name' => 'Khối lượng',
                    'code' => Str::random(8),
                    'category_product_id' => 5,
                ],
                [
                    'id' => 10,
                    'name' => 'Chiều dài (cm)',
                    'code' => Str::random(8),
                    'category_product_id' => 5,
                ],
                [
                    'id' => 11,
                    'name' => 'Chiều rộng (cm)',
                    'code' => Str::random(8),
                    'category_product_id' => 5,
                ],
            ];

            try {
                foreach ($attibutes as $attibute) {
                    $cateogory = CategoryProduct::find($attibute['category_product_id']);
                    if ($cateogory) {
                        Attribute::create($attibute);
                    }
                }
            } catch (\Throwable $th) {
            }
        }
    }
}
