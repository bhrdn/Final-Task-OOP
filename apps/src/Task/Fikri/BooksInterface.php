<?php 
namespace OpenLibrary\Task\Fikri;

/**
 * Books Interface
 */
interface BooksInterface
{
	const workspace = 'books/';

	public function setTitle($x);
	public function setAuthor($x);
	public function setDescription($x);
	public function setCategory($x);
	public function setTotal($x);
	
	public function getTitle();
	public function getAuthor();
	public function getDescription();
	public function getCategory();
	public function getTotal();

	public function getDatas();
}