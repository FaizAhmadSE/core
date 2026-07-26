<?php

declare(strict_types=1);

namespace UniFileManager\Core\Support;

use UniFileManager\Core\Contracts\StorageAreaResolver;

final class ConfigStorageAreaResolver implements StorageAreaResolver
{
    public function areas(): array
    {
        $areas = config('unifilemanager.storage_areas', []);

        return is_array($areas) ? $areas : [];
    }

    public function resolve(string $area): ?array
    {
        $configuration = $this->areas()[$area] ?? null;

        return is_array($configuration) ? $configuration : null;
    }
}
