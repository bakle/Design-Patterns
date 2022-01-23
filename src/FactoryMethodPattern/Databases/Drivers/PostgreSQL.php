<?php

namespace Bakle\DesignPatterns\FactoryMethodPattern\Databases\Drivers;

use Bakle\DesignPatterns\FactoryMethodPattern\Databases\DB;

class PostgreSQL extends DB
{

    protected function connect(): void
    {
       /* pg_connect(
            sprintf('host=%s port=%s user=%s password=%s dbname=%s',
                $this->getHost(),
                $this->getPort(),
                $this->getUser(),
                $this->getPassword(),
                $this->getDatabase()
            )
        ); */
    }

    public function select()
    {
        return 'select in postgresql';
    }

    public function insert()
    {
        return 'insert in postgresql';
    }

    public function update()
    {
        return 'update in postgresql';
    }

    public function delete()
    {
        return 'delete in postgresql';
    }
}