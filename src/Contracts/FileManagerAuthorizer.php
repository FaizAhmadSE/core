<?php

declare(strict_types=1);

namespace UniFileManager\Core\Contracts;

interface FileManagerAuthorizer
{
    public function can(mixed $user, string $operation, string $path = ''): bool;
}
