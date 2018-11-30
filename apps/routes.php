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
	$this->get('/{id}', Controllers\BooksLoanController::class . ':fetch');
	$this->put('/{id}', Controllers\BooksLoanController::class . ':update');
});

$app->group('/student', function() {
	$this->post('[/]', Controllers\StudentController::class . ':store');
	$this->get('/{id}', Controllers\StudentController::class . ':fetch');
});

$app->group('/books-manager', function() {
	$this->get('[/]', Controllers\BooksLoanController::class . ':index');
});