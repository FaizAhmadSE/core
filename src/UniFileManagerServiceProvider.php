<?php

declare(strict_types=1);

namespace UniFileManager\Core;

use Illuminate\Support\ServiceProvider;
use UniFileManager\Core\Contracts\FileManagerAuthorizer;
use UniFileManager\Core\Contracts\StorageAreaResolver;
use UniFileManager\Core\Services\FileManager;
use UniFileManager\Core\Support\ConfigStorageAreaResolver;

final class UniFileManagerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/unifilemanager.php', 'unifilemanager');

        $this->app->bind(FileManagerAuthorizer::class, config('unifilemanager.authorizer'));

        $storageAreaResolver = config('unifilemanager.storage_area_resolver');
        $this->app->bind(
            StorageAreaResolver::class,
            is_string($storageAreaResolver) ? $storageAreaResolver : ConfigStorageAreaResolver::class,
        );

        $this->app->singleton(FileManager::class);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/unifilemanager.php' => config_path('unifilemanager.php'),
        ], 'unifilemanager-config');
    }
}
