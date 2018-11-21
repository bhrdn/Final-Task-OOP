<?php
namespace OpenLibrary\Helpers;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Slim\Flash\Messages as FlashMessage;
use Slim\Http\Request;

class ViewExtension implements ExtensionInterface
{
    /**
     * @var \Slim\Http\Request
     */
    protected $request;

    /**
     * @var \Slim\Flash\Messages
     */
    protected $flash;

    /**
     * @var string
     */
    protected $mode;

    /**
     * View Extention
     *
     * @param \Slim\Http\Request $request
     */
    public function __construct(Request $request, FlashMessage $flash, $mode = 'development')
    {
        $this->request = $request;
        $this->flash   = $flash;
        $this->mode    = $mode;
    }

    /**
     * {@inheritdoc}
     */
    public function register(Engine $engine)
    {
        // Add app view data
        $engine->addData([
            'base_js'  => [],
            'base_css' => [],
        ]);

        // Register view js helpers
        $engine->registerFunction('appendJs', function (array $jsFiles = []) use ($engine) {
            $engine->addData(['base_js' => $jsFiles]);
        });

        // Register view css helpers
        $engine->registerFunction('appendCss', function (array $cssFiles = []) use ($engine) {
            $engine->addData(['base_css' => $cssFiles]);
        });
    }
}
