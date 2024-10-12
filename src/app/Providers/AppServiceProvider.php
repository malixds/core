<?php

namespace App\Providers;

use App\Interfaces\IChatRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IUserRepository;
use App\Models\Chat;
use App\Repositories\ChatRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IPostRepository::class, PostRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IChatRepository::class, ChatRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
