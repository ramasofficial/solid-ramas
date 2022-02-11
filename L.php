<?php

declare(strict_types=1);

// Bad approach
class Cat
{
    public function makeNoise(): void
    {
        echo 'Meow';
    }
}

class Dog
{
    public function makeNoise(): void
    {
        echo 'Ou Ou Ou';
    }
}

class AnimalSounds
{
    public function makeSound(Cat $animal): void
    {
        $animal->makeNoise();
    }
}

$animalSounds = new AnimalSounds();
$animalSounds->makeSound(new Cat());

// Good approach
abstract class Animal
{
    abstract public function makeNoise(): void;
}

class Cat extends Animal
{
    public function makeNoise(): void
    {
        echo 'Meow';
    }
}

class Dog extends Animal
{
    public function makeNoise(): void
    {
        echo 'Ou Ou Ou';
    }
}

class AnimalSounds
{
    public function makeSound(Animal $animal): void
    {
        $animal->makeNoise();
    }
}

$animalSounds = new AnimalSounds();
$animalSounds->makeSound(new Cat());
$animalSounds->makeSound(new Dog());
