<?php

declare(strict_types=1);

// Bad approach
class MySqlConnection
{
    public function connect() {}
}

class Application
{
    public function __construct(private MySqlConnection $connection) {}
}

// Good approach
interface Connection
{
    public function connect();
}

class MySqlConnection implements Connection
{
    public function connect() {}
}

class PostgreeSqlConnection implements Connection
{
    public function connect() {}
}

class Application
{
    public function __construct(private Connection $connection) {}
}
