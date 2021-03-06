<?php
namespace OpenLibrary\Controllers;

use OpenLibrary\Task\Harry\BooksLoan;
use Ramsey\Uuid\Uuid;

class BooksLoanController extends BooksLoan
{

    public function index()
    {
        $this->setPageTitle('Reserved Books');
        return $this->view->render('books::reserved', [
            'uuid_gen' => Uuid::uuid4()->toString()
        ]);
    }
}
