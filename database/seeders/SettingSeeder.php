<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\BlogPage\Entities\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('settings')->count() == 0) {
            Setting::create([
                 'company_name' => 'Công ty TNHH Lê Bùi', 'address' => 'Xưởng Carton Lê Bùi- Phù Dực, Phù Đổng, Gia Lâm, Hà Nội', 'email' => 'congtytnhhlebui@gmail.com', 'tax_code' => '0109408446', 'hotline' => '0983 407 085', 'zalo_phone' => '0983 407 085', 'facebook' => NULL, 'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7446.850221264581!2d105.95062487636743!3d21.055676756445067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a86f7ef7cb11%3A0x51a95da222c12905!2zUGjDuSBE4buxYywgUGjDuSDEkOG7lW5nLCBHaWEgTMOibSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1680260111094!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ]);
        }
    }
}
