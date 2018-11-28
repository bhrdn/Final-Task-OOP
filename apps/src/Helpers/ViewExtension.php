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
            'base_js'   => [],
            'base_css'  => [],
            'custom_js' => null,
        ]);

        // Register view js helpers
        $engine->registerFunction('appendJs', function (array $jsFiles = []) use ($engine) {
            foreach ($jsFiles as $js) $tmp[] = getenv('BASEURL') . $js;
            $engine->addData(['base_js' => $tmp]);
        });

        // Register view css helpers
        $engine->registerFunction('appendCss', function (array $cssFiles = []) use ($engine) {
            foreach ($cssFiles as $css) $tmp[] = getenv('BASEURL') . $css;
            $engine->addData(['base_css' => $tmp]);
        });

        // Register custom js helpers
        $engine->registerFunction('customJs', function($x) use ($engine) {
            $engine->addData(['custom_js' => $x]);
        });
    }
}
