<?php

declare(strict_types=1);

// Bad approach
class Book
{
    public function __construct(private string $title, private string $author)
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function save(): void
    {
        // Implement save logic
    }
}

$book = new Book('SOLID', 'Ramas Win');
$book->save();

// Good approach
class Book
{
    public function __construct(private string $title, private string $author)
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}

class BookRepository
{
    public function save(Book $book): void
    {
        // Implement save logic
    }
}

$book = new Book('SOLID', 'Ramas Win');
$bookRepository = new BookRepository();
$bookRepository->save($book);
