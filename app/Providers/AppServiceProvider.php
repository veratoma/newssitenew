<?php

namespace App\Providers;

use ContactsQueryBuilder;
use FeedbacksQueryBuilder;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\QueryBuilders\QueryBuilder;
use App\Services\UploadFileService;
use Illuminate\Pagination\Paginator;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Support\ServiceProvider;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsSourcesDataQueryBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, FeedbacksQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, ContactsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsSourcesDataQueryBuilder::class);

        //Service
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(UploadFileService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
    }
}
