<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elastic\Elasticsearch\Client;
use App\Repositories\DocumentRepository;
use Inertia\Inertia;

class SearchController
{

    protected $_elasticSearch;

    public function __construct(DocumentRepository $elasticSearch)
    {
        $this->_elasticSearch = $elasticSearch;
    }

    public function index ()
    {
        return Inertia::render('Search/Index');
    }

    public function searchResults(Request $request)
    {
        $perPage = $request->perPage ?? 10;
        $page = $request->page ?? 1;
        $searchString = $request->searchString;

        $time_start = microtime(true);
        $data = $this->_elasticSearch->search($perPage, $page, $searchString);
        $result = $this->prepareSearchData($data, $perPage, $page);
        $time_end = microtime(true);
        $exTime = ($time_end - $time_start);
        return Inertia::render('Search/Results', compact('result', 'exTime', 'searchString'));
    }

    protected function prepareSearchData($data, $perPage, $page)
    {
        $total = $data['hits']['total']['value'];
        $totalPages =
            ($total % $perPage) != 0 ?
            intdiv($total, $perPage)+1 :
            intdiv($total, $perPage);

        $hits = [];
        foreach ($data['hits']['hits'] as $document) {
            $hits[] = [
                'id' => $document['_source']['id'],
                'title' => $document['_source']['title'],
                'body' => $document['_source']['body'],
            ];
        }
        return [
            'total' => $total,
            'totalPages' => $totalPages,
            'perPage' => $perPage,
            'page' => $page,
            'hits' => $hits,
        ];
    }

}
