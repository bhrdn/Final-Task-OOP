<?php 
namespace OpenLibrary\Task\Fikri;

/**
 * Books
 */
class Books extends \OpenLibrary\Controllers
{
	public function getDatas()
	{
		$this->curl->get(getenv('API_ENDPOINT') . BooksInterface::workspace);

		return ($this->curl->error) ? [] : $this->curl->response;
	}
}