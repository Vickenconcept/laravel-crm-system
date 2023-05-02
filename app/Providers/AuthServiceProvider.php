<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Project;
use App\Models\Client;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        Gate::before(function($user, $ability) {
            if ($user->is_admin == 1) {
                return true;
            }
        });
        // gate for project
        Gate::define('update-project', function (User $user, Project $project) {
            return $user->id === $project->user_id;
        });
        Gate::define('delete-project', function (User $user, Project $project) {
            return $user->id === $project->user_id;
        });
        // gate for client
        Gate::define('update-client', function (User $user, Client $client) {
            return $user->id === $client->user_id;
        });
        Gate::define('delete-client', function (User $user, Client $client) {
            return $user->id === $client->user_id;
        });
        // gate for user
        Gate::define('delete-user', function (User $user){
            return $user->is_admin === 1;
        });

    }
}
