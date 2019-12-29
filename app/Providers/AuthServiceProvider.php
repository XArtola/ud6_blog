<?php

namespace App\Providers;

use App\Post;
use App\Policies\PostPolicy;
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
        //'App\Post' => 'App\Policies\PostPolicy',
        //'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        //'App\Post' => 'App\Policies\PostPolicy',  
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
