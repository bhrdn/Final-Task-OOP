<?php
namespace OpenLibrary\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class BookController extends \OpenLibrary\Controllers
{
    public function index(Request $request, Response $response, array $args)
    {
        $this->setPageTitle('Books');
        return $this->view->render('books::reserved', [
        	'test' => 'haha'
        ]);
    }
}
