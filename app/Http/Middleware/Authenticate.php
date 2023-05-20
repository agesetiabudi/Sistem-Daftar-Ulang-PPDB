<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if ($request->is('wpa-admin*')) {
            if (!$request->expectsJson()) {
                return route('admin.login');
            }
        }

        if ($request->is('kategori*') || $request->is('ujian*')) {
            if (!$request->expectsJson()) {
                return route('login');
            }
        }
    }
}
