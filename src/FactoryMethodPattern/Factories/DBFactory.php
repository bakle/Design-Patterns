<?php

namespace Bakle\DesignPatterns\FactoryMethodPattern\Factories;

use Bakle\DesignPatterns\FactoryMethodPattern\Config\Databases;
use Bakle\DesignPatterns\FactoryMethodPattern\Constants\Drivers;
use Bakle\DesignPatterns\FactoryMethodPattern\Databases\DB;
use Bakle\DesignPatterns\FactoryMethodPattern\Databases\Drivers\MySQLDriver;
use Bakle\DesignPatterns\FactoryMethodPattern\Databases\Drivers\PostgreSQL;

class DBFactory implements DBFactoryInterface
{

    public static function create(string $driver): DB
    {
        $driverClass = match ($driver) {
            Drivers::MYSQL => MySQLDriver::class,
            Drivers::POSTGRESQL => PostgreSQL::class,
            default => throw new \Exception('Driver not found')
        };

        return new $driverClass(Databases::getCredentialsForDriver($driver));
    }
}