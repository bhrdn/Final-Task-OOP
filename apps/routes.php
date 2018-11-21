<?php 
use OpenLibrary\Controllers\HomeController;

$app->get('/', HomeController::class . ':index');