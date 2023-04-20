<?php

namespace Modules\ProductCategory\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedFakeAttributeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        if (DB::table('attribute_categories')->count() == 0) {

            DB::table('attribute_categories')->insert([

                [
                    'name' => 'Sóng giấy',

                ],
                [
                    'name' => 'Lớp',

                ],
                [
                    'name' => 'Chiều dài',

                ], [
                    'name' => 'Chiều rộng',

                ],   [
                    'name' => 'Chiều cao',

                ],   [
                    'name' => 'Khối lượng',

                ],   [
                    'name' => 'Loại lõi',

                ]
            ]);
        }
    }
}
