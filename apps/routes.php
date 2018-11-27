<?php 
use OpenLibrary\Controllers;

$app->get('/', Controllers\HomeController::class . ':index');
$app->get('/login', Controllers\AuthController::class . ':loginPage');

$app->group('/books', function() {
	$this->get('/{isbn:[0-9]+}', Controllers\BookController::class . ':fetch');
	$this->put('/{isbn:[0-9]+}', Controllers\BookController::class . ':update');
	$this->delete('/{isbn:[0-9]+}', Controllers\BookController::class . ':delete');
});