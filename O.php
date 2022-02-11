<?php

declare(strict_types=1);

// Bad approach
class Book
{
    public function __construct(private string $type, private int $price)
    {
    }

    public function getType(): string
    {
        return strtolower($this->type);
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class Cart
{
    private array $books = [];

    public function add(Book $book): self
    {
        $this->books[] = $book;

        return $this;
    }

    public function totalPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->books as $book)
        {
            switch($book->getType()) {
                case 'simple':
                    $discount = 2;
                    break;
                case 'ebook':
                    $discount = 3;
                    break;
            }
            $totalPrice += $book->getPrice() - $discount;
        }

        return $totalPrice;
    }
}

$total = (new Cart())
    ->add(new Book('simple', 14))
    ->add(new Book('ebook', 16))
    ->add(new Book('simple', 10))
    ->totalPrice();

// Good approach
abstract class Book
{
    public function __construct(protected int $price)
    {
    }
}

class SimpleBook extends Book
{
    public const DISCOUNT = 2;

    public function calculatePrice(): int
    {
        return $this->price - self::DISCOUNT;
    }
}

class Ebook extends Book
{
    public const DISCOUNT = 3;

    public function calculatePrice(): int
    {
        return $this->price - self::DISCOUNT;
    }
}

class Cart
{
    private array $books = [];

    public function add(Book $book): self
    {
        $this->books[] = $book;

        return $this;
    }

    public function totalPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->books as $book)
        {
            $totalPrice += $book->calculatePrice();
        }

        return $totalPrice;
    }
}

$total = (new Cart())
    ->add(new SimpleBook(14))
    ->add(new Ebook(16))
    ->add(new SimpleBook(10))
    ->totalPrice();
