<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/../vendor/autoload.php';

use League\Plates\Extension\Asset as PlatesAsset;
use Slim\Collection;
use Slim\Container;
use Slim\Handlers\Error as SlimError;
use OpenLibrary\Helpers;

define('_DS_', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__) . _DS_);
define('APP_DIR', ROOT_DIR . 'apps' . _DS_);
define('WWW_DIR', __DIR__ . _DS_);

session_start();

$container = new Container([
    'settings' => [
        'displayErrorDetails' => true,
        'mode'                => 'development',
        'app'                 => [
            'name'  => 'Open Library - Telkom University',
            'email' => 'bhrdn@ieee.org',
        ],
        'view'                => [
            'directory'     => APP_DIR . 'views',
            'fileExtension' => 'php',
        ],

    ],
]);

$container['session'] = function () {
    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = [];
    }

    return new Collection($_SESSION['auth']);
};

$container['flash'] = function () {
    return new Slim\Flash\Messages;
};

$container['view'] = function ($container) {
    $settings = $container->get('settings');
    $view     = new Projek\Slim\Plates(
        $viewSettings = $settings->get('view'),
        $container->get('response')
    );

    // Add app view folders
    $view->addFolder('layouts', $viewSettings['directory'] . '/layouts');
    $view->addFolder('sections', $viewSettings['directory'] . '/sections');
    $view->addFolder('books', $viewSettings['directory'] . '/books');

    // Load app view extensions
    $view->loadExtension(new PlatesAsset(WWW_DIR));
    $view->loadExtension(new Helpers\ViewExtension(
        $request = $container->get('request'),
        $container->get('flash'),
        $settings->get('mode')
    ));

    $view->loadExtension(new Projek\Slim\PlatesExtension($container->get('router'), $request->getUri()));

    return $view;
};

$container['errorHandler'] = function ($container) {
    if ($container->get('settings')['mode'] !== 'development') {
        /**
         * @param \Slim\Http\Request $request
         * @param \Slim\Http\Response $response
         * @param \Exception $exception
         */
        return function ($request, $response, $exception) use ($container) {
            return $container->get('view')->render('errors/500', [
                'message' => $exception->getMessage(),
            ])->withStatus(500);
        };
    }

    return new SlimError(true);
};

$app = new Slim\App($container);

require_once APP_DIR . 'routes.php';

$app->run();
