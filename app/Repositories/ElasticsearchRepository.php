<?php

namespace App\Repositories;

use App\Models\Document;
use Elastic\Elasticsearch\Client;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;

class ElasticsearchRepository implements DocumentRepository
{

    protected Client $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    public function search(int $size, int $page, string $query = '')
    {
        $items = $this->searchOnElasticsearch($query, $size, $page);
        return $items;
    }

    private function searchOnElasticsearch(string $query = '', $size = 10, $page = 1): array
    {
        $model = new Document;
        $from = $page > 1 ? $size*$page + 1 : 0;

        $items = $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'body' => [
                'size' => $size,
                'from' => $from,
                'track_total_hits' => true,
                'query' => [
                    'query_string' => [
                        'fields' => ['body'],
                        "query" => $query
                    ],
                ],
            ],
        ]);
        return $items->asArray();
    }
}
