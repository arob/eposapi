<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Product' => 'App\Policies\ProductPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {

        $this->registerPolicies();
        // Passport::routes();

        // Gate::define('isAdmin', function($user) {
        //     return $user->type == 'admin';
        // });

        // Gate::define('isManager', function($user) {
        //     return $user->type == 'manager';
        // });

        
        // Gate::define('isSalesPerson', function($user) {
        //     return $user->type == 'salesperson';
        // });

        // Gate::define('isUser', function($user) {
        //     return $user->type == 'user';
        // });

        Gate::resource('product', 'App\Policies\ProductPolicy');
        Gate::resource('supplier', 'App\Policies\SupplierPolicy');
        Gate::resource('manufacturer', 'App\Policies\ManufacturerPolicy');
        Gate::resource('company', 'App\Policies\CompanyPolicy');
        Gate::resource('customer', 'App\Policies\CustomerPolicy');
        Gate::resource('purchaseInvoice', 'App\Policies\PurchaseInvoicePolicy');
        Gate::resource('salesInvoice', 'App\Policies\SalesInvoicePolicy');
        Gate::resource('user', 'App\Policies\UserPolicy');

    }
}
