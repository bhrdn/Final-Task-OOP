<?php
namespace OpenLibrary\Task\Fikri;

use OpenLibrary\Task\Fikri\AbstractBooks;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Books
 */
class Books extends AbstractBooks
{
    public function getDatas()
    {
        $this->curl->get(getenv('API_ENDPOINT') . BooksInterface::workspace);

        return ($this->curl->error) ? [] : $this->curl->response;
    }

    public function fetch(Request $request, Response $response, array $args)
    {
        $this->curl->get(getenv('API_ENDPOINT') . BooksInterface::workspace . $args['isbn']);
        return $response->withJson($this->curl->response);
    }

    public function update(Request $request, Response $response, array $args)
    {
        $this->curl->get(getenv('API_ENDPOINT') . BooksInterface::workspace . $args['isbn']);
        if (empty($this->curl->response)) exit;

        $datas = $request->getParsedBody();

        $this->setTitle($datas['title']);
        $this->setAuthor($datas['author']);
        $this->setDescription($datas['desc']);
        $this->setCategory($datas['category']);
        $this->setTotal($datas['total']);

        $this->curl->put(getenv('API_ENDPOINT') . BooksInterface::workspace . $args['isbn'], [
            'title'       => $this->getTitle(),
            'author'      => $this->getAuthor(),
            'description' => $this->getDescription(),
            'category'    => $this->getCategory(),
            'total'       => $this->getTotal(),
        ]);
    }

    public function delete(Request $request, Response $response, array $args)
    {
        $this->curl->delete(getenv('API_ENDPOINT') . BooksInterface::workspace . $args['isbn']);
    }

    public function store(Request $request, Response $response, array $args)
    {
        $datas = $request->getParsedBody();

        $this->setTitle($datas['title']);
        $this->setAuthor($datas['author']);
        $this->setDescription($datas['desc']);
        $this->setCategory($datas['category']);
        $this->setTotal($datas['total']);

        $this->curl->post(getenv('API_ENDPOINT') . BooksInterface::workspace, [
            'title'       => $this->getTitle(),
            'author'      => $this->getAuthor(),
            'description' => $this->getDescription(),
            'category'    => $this->getCategory(),
            'total'       => $this->getTotal(),
        ]);
    }
}
