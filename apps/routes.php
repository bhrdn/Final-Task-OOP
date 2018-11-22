<?php 
use OpenLibrary\Controllers;

$app->get('/', Controllers\HomeController::class . ':index');
$app->get('/login', Controllers\AuthController::class . ':loginPage');

$app->group('/books', function() {
	$this->get('[/]', function() {
		return 'OK';
	});

	$this->get('/reserved', function() {
		return 'OK';
	});
});