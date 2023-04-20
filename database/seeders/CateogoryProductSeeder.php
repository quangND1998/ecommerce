<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\ProductCategory\Entities\CategoryProduct;

class CateogoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('category_products')->count() == 0) {
            $categories = [
                [
                    'id' => 1,
                    'name' => 'Hộp Carton',
                    'slug' => Str::slug('Hộp Carton'),
                    'image' => 'seeder/xop.png',
                    'parent_id' => null,
                ],
                [
                    'id' => 2,
                    'name' => 'Hộp Carton 3 lớp',
                    'slug' => Str::slug('Hộp Carton 5 lớp'),
                    'image' => null,
                    'parent_id' => 1,
                ],
                [
                    'id' => 3,
                    'name' => 'Hộp Carton 5 lớp',
                    'slug' => Str::slug('Hộp Carton 5 lớp'),
                    'image' => null,
                    'parent_id' => 1,
                ],
                [
                    'id' => 4,
                    'name' => 'Xốp nổ',
                    'slug' => Str::slug('Xốp nổ'),
                    'image' => 'seeder/xopno.png',
                    'parent_id' => null,
                ],
                [
                    'id' => 5,
                    'name' => 'Băng dính',
                    'slug' => Str::slug('Băng dính'),
                    'image' => 'seeder/bangdinh.png',
                    'parent_id' => null,
                ],
            ];

            try {
                foreach ($categories as $category) {
                    CategoryProduct::create($category);
                }
            } catch (\Throwable $th) {
            }
        }
    }
}
