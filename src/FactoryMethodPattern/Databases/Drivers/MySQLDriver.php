<?php

namespace Bakle\DesignPatterns\FactoryMethodPattern\Databases\Drivers;

use Bakle\DesignPatterns\FactoryMethodPattern\Databases\DB;
use mysqli;

class MySQLDriver extends DB
{

    protected function connect(): void
    {
        // new mysqli($this->getHost(), $this->getUser(), $this->getPassword());
    }

    public function select()
    {
        return 'select in mysql';
    }

    public function insert()
    {
        return 'insert in mysql';
    }

    public function update()
    {
        return 'update in mysql';
    }

    public function delete()
    {
        return 'delete in mysql';
    }
}