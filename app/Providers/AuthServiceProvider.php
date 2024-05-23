<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Poste;
use App\Models\User;
use App\Policies\PostePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Poste' => 'App\Policies\PostePolicy',
        Poste::class=>PostePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("update",function(User $user,Poste $poste){
            return $user->id===$poste->user_id; 
        });
    }
}
