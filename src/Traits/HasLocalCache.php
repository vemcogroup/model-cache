<?php

namespace Vemcogroup\ModelCache\Traits;

trait HasLocalCache
{
    public static $localCache;

    public static function clearLocalCache(): void
    {
        self::$localCache = null;
    }

    public static function getLocalCache($key)
    {
        if ($cache = (self::$localCache[$key] ?? null)) {
            return $cache;
        }

        return false;
    }

    public static function setLocalCache($key, $data): void
    {
        self::$localCache[$key] = $data;
    }
}
