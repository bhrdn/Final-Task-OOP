<?php
namespace OpenLibrary\Task\Harry;

use OpenLibrary\Task\Fikri\AbstractBooks;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Books
 */
class BooksLoan extends AbstractBooks
{
    const workspace = 'loan/';

    public function getDatas()
    {
        $this->curl->get(getenv('API_ENDPOINT') . BooksLoan::workspace);

        return ($this->curl->error) ? [] : $this->curl->response;
    }

    public function fetch(Request $request, Response $response, array $args)
    {
        if ($args['id'] == "*") {
            return $response->withJson($this->getDatas());
        } else {
            $this->curl->get(getenv('API_ENDPOINT') . BooksLoan::workspace . $args['id']);
            return $response->withJson($this->curl->response);
        }
    }

    public function update(Request $request, Response $response, array $args)
    {
        foreach ($this->getDatas() as $data) {
            if ($data->reserved_id == $args['id']) {
                $this->curl->put(getenv('API_ENDPOINT') . BooksLoan::workspace . $args['id'], [
                    'reserved_id' => $data->reserved_id,
                    'id_books'    => $args['id'],
                    'nim'         => $data->nim,
                    'title'       => $data->title,
                    'status'      => 0,
                ]);

                return $this->curl->response;
                break;
            }
        }

        return '!OK';

    }

    public function store(Request $request, Response $response, array $args)
    {
        list($datas, $status) = [$request->getParsedBody(), false];

        $this->curl->get(getenv('BASEURL') . 'books/*');
        var_dump($datas['title']);
        foreach ($this->curl->response as $data) {
            if (strtolower($datas['title']) == strtolower($data->title)) {

                if ($data->total == 0) {
                    $status = true;
                    break;
                }

                $this->curl->put(getenv('API_ENDPOINT') . 'books/' . $data->id, [
                    'title'       => $data->title,
                    'author'      => $data->author,
                    'description' => $data->description,
                    'category'    => $data->category,
                    'total'       => $data->total - 1,
                ]);

                $this->curl->post(getenv('API_ENDPOINT') . BooksLoan::workspace, [
                    'id_books'    => $data->id,
                    'reserved_id' => $datas['uuid'],
                    'nim'         => $datas['nim'],
                    'title'       => $datas['title'],
                    'status'      => 1,
                ]);
                break;
            }
        }
    }
}
