<?php

namespace App\Providers;

use App\Repositories\DocumentRepository;
use App\Repositories\ElasticsearchRepository;
use App\Repositories\EloquentRepository;
use Illuminate\Support\ServiceProvider;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(DocumentRepository::class, function () {
            if (!config('services.search.enabled')) {
                return new EloquentRepository();
            }
            return new ElasticsearchRepository(
                $this->app->make(Client::class)
            );
        });
        $this->bindSearchClient();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }
}
