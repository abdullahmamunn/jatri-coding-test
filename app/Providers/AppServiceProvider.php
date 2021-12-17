<?php

namespace App\Providers;

use App\Repositories\TicketRepository;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TicketRepositoryInterface::class,TicketRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
