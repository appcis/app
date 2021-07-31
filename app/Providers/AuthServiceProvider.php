<?php

namespace App\Providers;

use App\Models\Sms;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function () {
            $admins = explode(';', env('ADMINS')) ?? [];
            return in_array(\Auth::user()->email, $admins);
        });

        Gate::define('show-sms', function (User $user, Sms $sms) {
            return $user->id === $sms->user_id;
        });
    }
}
