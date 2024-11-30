<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class PageService
{
    static function pageFor(string $role)
    {
        if ($role !== Auth::user()->role) {
            abort(403);
        }
    }

    static function pageForMultiple(array $role)
    {
        if (!in_array(Auth::user()->role, $role)) {
            abort(403);
        }
    }
}
