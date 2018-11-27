<?php
namespace OpenLibrary\Controllers;

use OpenLibrary\Task\Fikri\Books;

class HomeController extends Books  {
	
    public function index()
    {
        $this->setPageTitle('Dashboard');
        return $this->view->render('index.oplib', [
        	'books' => $this->getDatas()
        ]);
    }
}
