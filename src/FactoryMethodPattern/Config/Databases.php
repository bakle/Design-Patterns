<?php

namespace Bakle\DesignPatterns\FactoryMethodPattern\Config;

use Bakle\DesignPatterns\FactoryMethodPattern\Constants\Drivers;

class Databases
{
    public static function getCredentialsForDriver(string $driver): array
    {
        return self::credentials()[$driver];
    }

    private static function credentials(): array
    {
        return [
            Drivers::MYSQL => [
                'host' => 'localhost',
                'port' => '3306',
                'user' => 'user',
                'password' => 'password',
                'database' => 'example',
            ],
            Drivers::POSTGRESQL => [
                'host' => 'localhost',
                'port' => '3307',
                'user' => 'user',
                'password' => 'password',
                'database' => 'example',
            ]
        ];
    }
}