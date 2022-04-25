<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Core\Eloquent\{
    EloquentCategoryRepository,
    EloquentProductRepository,
    EloquentChartRepository
};

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    ProductRepositoryInterface,
    ChartRepositoryInterface
};

use App\Repositories\Core\QueryBuilder\{
    QueryBuilderCategoryRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class, //Chama esta classe e
            EloquentProductRepository::class //Cria este objeto
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            QueryBuilderCategoryRepository::class
            //EloquentCategoryRepository::class
        );

        $this->app->bind(
            ChartRepositoryInterface::class,
            EloquentChartRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
