<?php
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Book;

class BookTest extends TestCase
{
    public function testBookProperties()
    {
        $book = new Book('1984', 'George Orwell');

        $this->assertEquals('1984', $book->getTitle());
        $this->assertEquals('George Orwell', $book->getAuthor());
    }
}
