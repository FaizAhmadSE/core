<?php

declare(strict_types=1);

namespace UniFileManager\Core\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use UniFileManager\Core\Contracts\FileManagerAuthorizer;
use UniFileManager\Core\UniFileManagerServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            UniFileManagerServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('unifilemanager.disk', 'testing_core');
        $app['config']->set('unifilemanager.root', 'tenant-a');
        $app['config']->set('unifilemanager.storage_areas.private', [
            'enabled' => true,
            'disk' => 'testing_core',
            'root' => 'tenant-a',
            'visibility' => 'private',
        ]);
        $app['config']->set('filesystems.disks.testing_core', ['driver' => 'local', 'root' => storage_path('framework/testing/disks/testing-core')]);
        $app->bind(FileManagerAuthorizer::class, static fn (): FileManagerAuthorizer => new class implements FileManagerAuthorizer
        {
            public function can(mixed $user, string $operation, string $path = ''): bool
            {
                return $user !== null;
            }
        });
    }
}
