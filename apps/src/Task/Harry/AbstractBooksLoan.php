<?php
namespace OpenLibrary\Task\Harry;

use OpenLibrary\Task\Fikri\BooksInterface;

/**
 * Books Abstract
 */
abstract class AbstractBooksLoan extends \OpenLibrary\Controllers implements BooksInterface
{
    protected $title, $author, $desc, $category, $total;
    public $workspace = 'loan/';

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
    	$this->author = $author;
    }

    public function setDescription($desc)
    {
    	$this->desc = $desc;
    }

    public function setCategory($category)
    {
    	$this->category = $category;
    }

    public function setTotal($total)
    {
    	$this->total = $total;
    }

    public function getTitle()
    {
    	return $this->title;
    }

    public function getAuthor()
    {
    	return $this->author;
    }

    public function getDescription()
    {
    	return $this->desc;
    }

    public function getCategory()
    {
    	return $this->category;
    }

    public function getTotal()
    {
    	return $this->total;
    }
}
