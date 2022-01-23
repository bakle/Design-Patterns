<?php

namespace Bakle\DesignPatterns\Test;

use Bakle\DesignPatterns\FactoryMethodPattern\Constants\Drivers;
use Bakle\DesignPatterns\FactoryMethodPattern\Main;
use PHPUnit\Framework\TestCase;

class FactoryMethodPatternTest extends TestCase
{
    public function testFactoryMethodPatternWithMySQL(): void
    {
       $mainClass = new Main(Drivers::MYSQL);

       $this->assertEquals('select in mysql', $mainClass->selectItems());
       $this->assertEquals('insert in mysql', $mainClass->insertItems());
       $this->assertEquals('update in mysql', $mainClass->updateItems());
       $this->assertEquals('delete in mysql', $mainClass->deleteItems());
    }

    public function testFactoryMethodPatternWithPostgreSQL(): void
    {
        $mainClass = new Main(Drivers::POSTGRESQL);

        $this->assertEquals('select in postgresql', $mainClass->selectItems());
        $this->assertEquals('insert in postgresql', $mainClass->insertItems());
        $this->assertEquals('update in postgresql', $mainClass->updateItems());
        $this->assertEquals('delete in postgresql', $mainClass->deleteItems());
    }

    public function testFactoryMethodPatternWithUnknownDriver(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Driver not found');
        $mainClass = new Main('testing');
    }
}