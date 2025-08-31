<?php

namespace Database\Seeders;

use App\Models\CmsSetting;
use Illuminate\Database\Seeder;

class CmsSettingSeeder extends Seeder
{
    public function run()
    {
        $defaults = [
            ['key' => 'banner_title', 'value' => 'Automatize seus atendimentos no WhatsApp'],
            ['key' => 'banner_subtitle', 'value' => 'Responda automaticamente e venda mais com nosso SaaS.'],
            ['key' => 'banner_image', 'value' => '/images/banner-hero.jpg'],
        ];

        foreach ($defaults as $item) {
            CmsSetting::firstOrCreate(['key' => $item['key']], $item);
        }
    }
}
