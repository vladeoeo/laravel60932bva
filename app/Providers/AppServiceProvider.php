<?php

namespace App\Providers;

use App\Models\Good;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        Gate::define('actions-good',function (User $user, Good $good){
           return $good->price < 1000 ;
        });

        Gate::define('leave-review', function (User $user, Good $good) {
            $exists = $user->orders()
                ->whereHas('order_items', function($query) use ($good) {
                    $query->where('product_id', $good->product_id);
                })
                ->exists();

            return $exists;
        });

        Gate::define('create-good',function (User $user){
            return true;
        });

    }
}
