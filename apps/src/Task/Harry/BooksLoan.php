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
            if ($data->reserved_id == $args['id'] && $data->status == 1) {

                $this->curl->put(getenv('API_ENDPOINT') . BooksLoan::workspace . $data->id, [
                    'status' => 0,
                ]);

                $this->curl->get(getenv('API_ENDPOINT') . 'books/' . $data->id_books);
                $this->curl->put(getenv('API_ENDPOINT') . 'books/' . $data->id_books, [
                    'total' => $this->curl->response->total + 1,
                ]);

                return 'OK';
                break;
            }
        }

        return '!OK';

    }

    public function store(Request $request, Response $response, array $args)
    {
        list($datas, $status) = [$request->getParsedBody(), false];

        $this->curl->get(getenv('BASEURL') . 'books/*');

        foreach ($this->curl->response as $data) {
            if (strtolower($datas['title']) == strtolower($data->title)) {

                if ($data->total == 0) {
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

                return $response->withJson($this->curl->response);
                break;
            }
        }
    }

    public function datatables(Request $request, Response $response, array $args)
    {
        $result = array();
        foreach ($this->getDatas() as $data) {
            $result[] = [
                'rsv'       => $data->reserved_id,
                'title'     => $data->title,
                'tanggal_1' => $data->created_at,
                'tanggal_2' => ($data->updated_at == $data->created_at) ? '-' : $data->updated_at,
                'status'    => ($data->status == 0) ? "<span class='label label-success'>Buku Sudah Dikembalikan</span>" : "<span class='label label-danger'>Buku Belum Dikembalikan</span>",
            ];
        }

        return $response->withJson(['data' => $result]);
    }
}
