<?php
namespace OpenLibrary;

/**
 * Controllers
 */
use Slim\Container;
use Slim\Http\Request;

abstract class Controllers
{
    use ContainerAware;

    public function __construct(Container $container)
    {
        $session = $container->get('session');

        $this->container = $container;
        $this->setPageTitle();

        if ($session->get('status')) {
            // OK
        }
    }

    protected function setPageTitle($mainTitle = '', $subTitle = '')
    {
        $this->view->addData([
            'page_title'     => $mainTitle,
            'sub_page_title' => $subTitle,
        ]);
    }

    protected function flashValidationErrors(array $errors)
    {
        foreach ($errors as $field => $message) {
            $this->flash->addMessage('validation.errors.' . $field, implode(', ', $message));
        }
        if ($inputs = $this->request->getParsedBody()) {
            $this->flash->addMessage('form.inputs', serialize(array_filter($inputs)));
        }
    }

}
