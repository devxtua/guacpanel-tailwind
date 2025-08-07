<?php

// app/Http/Middleware/RedirectIfShopUnauthenticated.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RedirectIfShopUnauthenticated
{
    public function handle(Request $request, Closure $next)
    {
        $shop = $request->query('shop');

        if ($shop && Str::endsWith($shop, '.myshopify.com') && !Auth::guard('shopify')->check()) {
            return redirect()->route('shopify.authenticate', ['shop' => $shop]);
        }

        return $next($request);
    }
}

