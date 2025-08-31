<?php

namespace App\Http\Controllers;

use App\Services\CmsService;
use Illuminate\Http\Request;

class CmsSettingController extends Controller
{
    protected $cmsService;

    public function __construct(CmsService $cmsService)
    {
        $this->cmsService = $cmsService;
    }

    public function banner()
    {
        return response()->json($this->cmsService->getBannerData());
    }

    public function updateBanner(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'image' => 'nullable|img|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'subtitle']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->cmsService->updateBanner($data);

        return response()->json(['message' => 'Banner atualizado com sucesso']);
    }
}
