<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // user->can('rate', $post);
        Gate::define('rate', function (User $user, Post $post) {
            if (!$post->exists) {
                return Response::deny('no_exists');
            }
            if ($post->isRatedBy($user)) {
                return Response::deny('single_rating');
            }

            return Response::allow();
        });
    }
}
