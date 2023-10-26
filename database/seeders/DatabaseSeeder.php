<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $setting_state =
        [
            ['key'=> "order_whatsapp_state",
                'label_ar'=> "ارسال الطلبات عبر الواتس",
                'label_en'=> "Send Orders via Whatsapp",
                'language'=> "ar",
                'value' => 0
            ],
            [
                'key'=> "order_whatsapp_state",
                'label_ar'=> "ارسال الطلبات عبر الواتس",
                'label_en'=> "Send Orders via Whatsapp",
                'language'=> "en",
                'value' => 0
            ],
            [
                'key'=> "order_whatsapp_state",
                'label_ar'=> "ارسال الطلبات عبر الواتس",
                'label_en'=> "Send Orders via Whatsapp",
                'language'=> "tr",
                'value' => 0
            ]
        ];
        \App\Setting::insert($setting_state);
    }
}
