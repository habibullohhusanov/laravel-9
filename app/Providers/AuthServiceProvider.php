<?php

namespace App\Providers;

use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
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
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-photo', function (User $user, Photo $photo) {
            return $user->id === $photo->user_id;
        });
        Gate::define('delete-photo', function (User $user, Photo $photo) {
            return $user->id === $photo->user_id;
        });
    }
}
