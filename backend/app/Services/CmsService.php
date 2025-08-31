<?php

namespace App\Services;

use App\Models\CmsSetting;
use App\Models\Plan;
use Illuminate\Http\UploadedFile;

class CmsService
{
    public function getBannerData(): array
    {
        return [
            'title'    => CmsSetting::get('banner_title', 'Automatize seus atendimentos'),
            'subtitle' => CmsSetting::get('banner_subtitle', 'Responda automaticamente no WhatsApp.'),
            'image'    => CmsSetting::get('banner_image', '/images/banner-default.jpg'),
        ];
    }

    public function updateBanner(array $data): void
    {
        CmsSetting::set('banner_title', $data['title']);
        CmsSetting::set('banner_subtitle', $data['subtitle']);     

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $path = $data['image']->store('cms', 'public');
            CmsSetting::set('banner_image', "/storage/{$path}");    
        }
    }

    public function getPlansForLanding(): array
    {    
        return Plan::where('is_visible', true)->get()->toArray();
    }
}
