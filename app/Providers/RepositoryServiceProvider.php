<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Interfaces\TodolistRepositoryInterface;
use App\Repositories\TodolistRepository;
use App\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Interfaces\MemberRepositoryInterface;
use App\Repositories\MemberRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TodolistRepositoryInterface::class, TodolistRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
