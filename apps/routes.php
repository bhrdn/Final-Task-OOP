<?php 
use OpenLibrary\Controllers;

$app->get('/', Controllers\HomeController::class . ':index');
$app->get('/login', Controllers\AuthController::class . ':loginPage');

$app->group('/books', function() {
	$this->post('[/]', Controllers\BooksController::class . ':store');
	$this->get('/{isbn}', Controllers\BooksController::class . ':fetch');
	$this->put('/{isbn:[0-9]+}', Controllers\BooksController::class . ':update');
	$this->delete('/{isbn:[0-9]+}', Controllers\BooksController::class . ':delete');
});

$app->group('/loan', function() {
	$this->post('[/]', Controllers\BooksLoanController::class . ':store');
	$this->get('/{isbn}', Controllers\BooksLoanController::class . ':fetch');
	$this->put('/{isbn:[0-9]+}', Controllers\BooksLoanController::class . ':update');
	$this->delete('/{isbn:[0-9]+}', Controllers\BooksLoanController::class . ':delete');
});

$app->group('/books-manager', function() {
	$this->get('[/]', Controllers\BooksLoanController::class . ':index');
});