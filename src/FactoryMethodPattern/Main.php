<?php

namespace Bakle\DesignPatterns\FactoryMethodPattern;

use Bakle\DesignPatterns\FactoryMethodPattern\Databases\DB;
use Bakle\DesignPatterns\FactoryMethodPattern\Factories\DBFactory;

class Main
{
    private DB $databaseDriver;

    public function __construct(string $connection)
    {
        $this->databaseDriver = DBFactory::create($connection);
    }

    public function selectItems()
    {

        return $this->databaseDriver->select();
    }

    public function insertItems()
    {
        return $this->databaseDriver->insert();
    }

    public function updateItems()
    {
        return $this->databaseDriver->update();
    }

    public function deleteItems()
    {
        return $this->databaseDriver->delete();
    }
}