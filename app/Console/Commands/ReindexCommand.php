<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Document;
use Elastic\Elasticsearch\Client;

class ReindexCommand extends Command
{
    protected $signature = 'search:reindex';

    protected $description = 'Indexes all documents to Elasticsearch';

    private $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        parent::__construct();
        $this->elasticsearch = $elasticsearch;

    }

    public function handle()
    {
        $time_start = microtime(true);
        $this->info('Indexing all documents. This might take a while...');
        Document::chunk(5000, function ($documents) {
            foreach ($documents as $document)
            {
                $this->elasticsearch->index([
                    'index' => $document->getSearchIndex(),
                    'type' => $document->getSearchType(),
                    'id' => $document->getKey(),
                    'body' => $document->toSearchArray(),
                ]);
                $this->output->write('.');
            }
        });

        $time_end = microtime(true);
        $this->info('\nDone!');
        $this->info(($time_end - $time_start));
    }
}
