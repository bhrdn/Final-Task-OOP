<?php
namespace OpenLibrary\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends \OpenLibrary\Controllers
{
    public function index(Request $request, Response $response, array $args)
    {
        $this->setPageTitle('Dashboard');
        return $this->view->render('index.oplib', [
        	'test' => 'haha'
        ]);
    }
}
