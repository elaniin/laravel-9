<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        $this->registerPasswordDefaults();
    }

    /**
     * Boot password defaults
     *
     * @return void
     */
    protected function registerPasswordDefaults(): void
    {
        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()
                ->uncompromised();
        });
    }
}
