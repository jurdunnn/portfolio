<?php

namespace App\Enums;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Enum
{
    public static function toArray(): array
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }

    public static function collect(): Collection
    {
        return collect(static::toArray());
    }

    public static function values(): Collection
    {
        return static::collect()->values();
    }

    public static function keys(): Collection
    {
        return static::collect()->keys();
    }

    public static function get($value): ?string
    {
        return static::collect()->search($value);
    }

    public static function flip(): Collection
    {
        return static::collect()->flip();
    }

    public static function titles(): Collection
    {
        return static::flip()->map(
            fn ($name) => Str::title(str_replace('_', ' ', $name))
        );
    }

    public static function title($value): ?string
    {
        return static::titles()->get($value);
    }

    public static function kebabs(): Collection
    {
        return static::flip()->map(
            fn ($name) => Str::kebab(strtolower($name))
        );
    }
}
