<?php

namespace App\Cache;

use App\Models\System;

/**
 * Interface for managing a user's selections within session.
 */
class SystemsCache
{

    private const KEY = 'selected_systems';

    public static function getKey(): string
    {
        return self::KEY;
    }

    /**
     * Update selected systems storage for current user.
     *
     * @param System[] $systems
     */
    public static function set(array $systems)
    {
        session()->put(self::getKey(), $systems);
    }

    public static function get(): array
    {
        return session(self::getKey(), []);
    }

    public static function clear()
    {
        session()->forget(self::getKey());
    }
}
