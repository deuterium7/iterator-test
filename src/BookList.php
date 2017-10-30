<?php

namespace AlexanderZabornyi\IteratorTest;

class BookList implements \Countable, \Iterator
{
    private $books = [];
    private $currentIndex = 0;

    /**
     * Добавить книгу
     *
     * @param Book $book
     */
    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    /**
     * Удалить книгу
     *
     * @param Book $bookToRemove
     */
    public function removeBook(Book $bookToRemove)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getAuthorAndTitle() === $bookToRemove->getAuthorAndTitle()) {
                unset($this->books[$key]);
            }
        }

        $this->books = array_values($this->books);
    }

    /**
     * Общее число книг
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->books);
    }

    /**
     * Текущая книга
     *
     * @return Book
     */
    public function current(): Book
    {
        return $this->books[$this->currentIndex];
    }

    /**
     * Ключ книги
     *
     * @return int
     */
    public function key(): int
    {
        return $this->currentIndex;
    }

    /**
     * Следующая книга
     */
    public function next()
    {
        $this->currentIndex++;
    }

    /**
     * Обнулить индекс
     */
    public function rewind()
    {
        $this->currentIndex = 0;
    }

    /**
     * Книга существует?
     *
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->books[$this->currentIndex]);
    }
}