<?php

declare(strict_types=1);

// Bad approach
interface BookInterface
{
    public function read();

    public function download();
}

class SimpleBook implements BookInterface
{
    public function read()
    {
        echo 'Read book';
    }

    public function download()
    {
        throw new Exception('Method not implemented');
    }
}

class EBook implements BookInterface
{
    public function read()
    {
        echo 'Read book';
    }

    public function download()
    {
        echo 'Download';
    }
}

// Good approach
interface BookInterface
{
    public function read();
}

interface EBookInterface extends BookInterface
{
    public function download();
}

class SimpleBook implements BookInterface
{
    public function read()
    {
        echo 'Read book';
    }
}

class EBook implements EBookInterface
{
    public function read()
    {
        echo 'Read book';
    }

    public function download()
    {
        echo 'Download';
    }
}
