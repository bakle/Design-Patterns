<?php

namespace Bakle\DesignPatterns\ObserverPattern\Constants;

use ReflectionClass;

class Statuses
{
    public const CREATED = 'created';
    public const PAID = 'paid';
    public const CANCELED = 'canceled';
    public const REJECTED = 'rejected';

    public static function toArray(): array
    {
        return (new ReflectionClass(self::class))->getConstants();
    }


    public static function isValidStatus(string $status): bool
    {
        return in_array($status, self::toArray());
    }
}