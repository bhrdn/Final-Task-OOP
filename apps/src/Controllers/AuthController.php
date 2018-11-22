<?php
namespace OpenLibrary\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class AuthController extends \OpenLibrary\Controllers
{
    public function loginPage(Request $request, Response $response, array $args)
    {
        return $this->view->render('login.oplib');
    }
}
