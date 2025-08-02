<?php

namespace App\Http\Controllers\Shopify;

use App\Models\Personalisation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InstallPageController
{
    public function __invoke(Request $request)
    {
        $settings = Personalisation::first();

        return Inertia::render('Shopify/Install', [
            'shop' => $request->query('shop'),
            'appName' => $settings?->app_name ?? 'Shopify App',
            'appLogo' => $settings?->app_logo
                ? asset('storage/' . $settings->app_logo)
                : null,
        ]);
    }
}



