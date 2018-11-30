<?php
namespace OpenLibrary\Task\Habib;

use OpenLibrary\Task\Habib\StudentAbstract;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Student Class
 */
class Student extends StudentAbstract
{
    public function getDatas()
    {
        $this->curl->get(getenv('API_ENDPOINT') . StudentAbstract::workspace);

        return ($this->curl->error) ? [] : $this->curl->response;
    }

    public function fetch(Request $request, Response $response, array $args)
    {
        if ($args['id'] == "*") {
            return $response->withJson($this->getDatas());
        } else {
            $this->curl->get(getenv('API_ENDPOINT') . StudentAbstract::workspace);
            if ($this->curl->error) {
                exit;
            }

            $result = array();
            foreach ($this->curl->response as $datas) {
                if ($args['id'] == strtolower($datas->nim)) {
                    $result[] = $datas;
                }
            }

            return $response->withJson($result);
        }

    }
}
