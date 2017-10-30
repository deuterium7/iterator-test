<?php

namespace AlexanderZabornyi\IteratorTest\Tests;

use AlexanderZabornyi\IteratorTest\Book;
use AlexanderZabornyi\IteratorTest\BookList;
use PHPUnit\Framework\TestCase;

class IteratorTest extends TestCase
{
    public function testCanAddBookToList()
    {
        $book = new Book('Some title', 'Some Author');

        $bookList = new BookList();
        $bookList->addBook($book);

        $this->assertCount(1, $bookList);
    }

    public function testCanRemoveBookFromList()
    {
        $book = new Book('Some title', 'Some Author');

        $bookList = new BookList();
        $bookList->addBook($book);
        $bookList->removeBook($book);

        $this->assertCount(0, $bookList);
    }

    public function testCanIterateOverBookList()
    {
        $bookList = new BookList();
        $bookList->addBook(new Book('Title1', 'Author1'));
        $bookList->addBook(new Book('Title2', 'Author2'));
        $bookList->addBook(new Book('Title3', 'Author3'));

        $books = [];

        foreach ($bookList as $book) {
            $books[] = $book->getAuthorAndTitle();
        }

        $this->assertEquals(
            [
                'Title1 by Author1',
                'Title2 by Author2',
                'Title3 by Author3',
            ],
            $books
        );
    }

    public function testCanIterateOverBookListAfterRemovingBook()
    {
        $book = new Book('Title1', 'Author1');
        $book2 = new Book('Title2', 'Author2');
        $book3 = new Book('Title3', 'Author3');

        $bookList = new BookList();
        $bookList->addBook($book);
        $bookList->addBook($book2);
        $bookList->addBook($book3);
        $bookList->removeBook($book2);

        $books = [];

        foreach ($bookList as $book) {
            $books[] = $book->getAuthorAndTitle();
        }

        $this->assertEquals(
            [
                'Title1 by Author1',
                'Title3 by Author3',
            ],
            $books
        );
    }
}