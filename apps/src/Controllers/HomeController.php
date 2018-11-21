<?php
namespace OpenLibrary\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use OpenLibrary\Controllers;

class HomeController extends Controllers
{
    public function index(Request $request, Response $response, array $args)
    {
        $this->setPageTitle('foo', 'bar');
        return $this->view->render('index.oplib', [
        	'test' => 'haha'
        ]);
    }
}
