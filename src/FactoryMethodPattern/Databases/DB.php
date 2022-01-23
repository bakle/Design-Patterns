<?php

namespace Bakle\DesignPatterns\FactoryMethodPattern\Databases;

abstract class DB
{
    private string $host;
    private string $user;
    private string $password;
    private string $database;
    private string $port;

    public function __construct(array $config)
    {
        $this->host = array_key_exists('host', $config) ? $config['host'] : '';
        $this->user = array_key_exists('user', $config) ? $config['user'] : '';
        $this->password = array_key_exists('password', $config) ? $config['password'] : '';
        $this->database = array_key_exists('database', $config) ? $config['database'] : '';
        $this->port = array_key_exists('port', $config) ? $config['port'] : '';

        $this->connect();
    }

    protected function getUser(): string
    {
        return $this->user;
    }

    protected function getPassword(): string
    {
        return $this->password;
    }

    protected function getDatabase(): string
    {
        return $this->database;
    }

    protected function getPort(): string
    {
        return $this->port;
    }

    protected function getHost(): string
    {
        return $this->host;
    }

    abstract protected function connect(): void;

    abstract public function select();
    abstract public function insert();
    abstract public function update();
    abstract public function delete();
}