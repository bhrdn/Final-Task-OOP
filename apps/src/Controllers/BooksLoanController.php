<?php
namespace OpenLibrary\Controllers;

use Ramsey\Uuid\Uuid;

class BooksLoanController extends \OpenLibrary\Controllers
{

    public function index()
    {
        $this->setPageTitle('Reserved Books');
        return $this->view->render('books::reserved', [
            'uuid_gen' => Uuid::uuid4()->toString(),
            'books'    => [],
        ]);
    }
}
