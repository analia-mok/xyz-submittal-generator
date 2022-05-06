<?php

namespace App\Cache;

use App\Models\System;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class SystemsCache
{

    private const KEY = 'selected_systems';

    public static function getKey(): string
    {
        return self::KEY . '_' . Session::getId();
    }

    /**
     * Update selected systems storage for current user.
     *
     * @param System[] $systems
     * @return void
     */
    public static function set(array $systems)
    {
        Cache::put(self::getKey(), $systems, now()->addDay());
    }

    public static function get(): array
    {
        return Cache::get(self::getKey(), []);
    }

    public static function clear()
    {
        Cache::forget(self::getKey());
    }
}
