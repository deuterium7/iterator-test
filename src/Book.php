<?php

namespace AlexanderZabornyi\IteratorTest;

class Book
{
    private $author;
    private $title;

    /**
     * Book constructor.
     *
     * @param string $title
     * @param string $author
     */
    public function __construct(string $title, string $author)
    {
        $this->author = $author;
        $this->title = $title;
    }

    /**
     * Получить автора
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Получить заголовок
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Получить автора и заголовок
     *
     * @return string
     */
    public function getAuthorAndTitle(): string
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}