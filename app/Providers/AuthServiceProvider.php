<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use App\Models\User;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ClientPolicy;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Order::class => OrderPolicy::class,
        Product::class => ProductPolicy::class,
        Client::class => ClientPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        Gate::define('update-order', function (User $user, Order $order) {
            return $user->id === $order->user_id
                ? Response::allow()
                : Response::deny('You do not own this order.');
        });

        Gate::define('delete-order', function (User $user, Order $order) {
            return $user->id === $order->user_id
                ? Response::allow()
                : Response::deny('You do not own this order.');
        });

        Gate::define('is-admin', function (User $user) {
            return $user->isAdmin
                        ? Response::allow()
                        : Response::deny('You are not an admin.');
        });

    }
}
