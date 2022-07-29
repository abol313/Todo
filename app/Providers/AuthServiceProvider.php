<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Todo;
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
        
        Gate::define('update-todo', function(User $user, Todo $todo){
            return !!$user->hasTodo($todo);
        });
        Gate::define('destroy-todo', function(User $user, Todo $todo){
            return !!$user->hasTodo($todo) 
            && now()->getTimestamp() - $todo->getAttribute($todo->getCreatedAtColumn())->timestamp > 10;
        });

        //
    }
}
