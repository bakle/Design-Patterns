<?php

namespace Bakle\DesignPatterns\FactoryMethodPattern\Factories;

use Bakle\DesignPatterns\FactoryMethodPattern\Databases\DB;

interface DBFactoryInterface
{
    public static function create(string $driver): DB;
}