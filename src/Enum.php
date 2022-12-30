<?php

namespace JlTwc\JlLaravelExtras;

abstract class Enum
{
    private $enumValue;

    public function __construct($enumValue)
    {
        $this->enumValue = $enumValue;
    }

    public function getValue()
    {
        return $this->enumValue;
    }

    public function getKey()
    {
        return self::search($this->enumValue);
    }

    public function isValid()
    {
        return self::hasValue($this->enumValue);
    }

    public function is($value)
    {
        if ($value instanceof self) {
            $value = $value->getValue();
        }

        return $this->enumValue === $value;
    }

    public static function all()
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }

    public static function collection()
    {
        return collect(self::all());
    }

    public static function get($key)
    {
        return self::collection()->get($key);
    }

    public static function values()
    {
        return self::collection()->values()->all();
    }

    public static function hasValue($value)
    {
        return self::collection()->contains($value);
    }

    public static function keys()
    {
        return self::collection()->keys()->all();
    }

    public static function hasKey($key)
    {
        return self::collection()->has($key);
    }

    public static function search($value)
    {
        return self::collection()->search($value);
    }
}
