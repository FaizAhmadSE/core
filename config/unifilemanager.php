<?php

declare(strict_types=1);

use UniFileManager\Core\Support\ConfigStorageAreaResolver;
use UniFileManager\Core\Support\DefaultFileManagerAuthorizer;

return [
    'disk' => env('UNIFILEMANAGER_DISK', 'local'),

    'root' => env('UNIFILEMANAGER_ROOT', 'file-manager'),

    'visibility' => 'private',

    'storage_areas' => [
        'private' => [
            'enabled' => true,
            'disk' => env('UNIFILEMANAGER_DISK', 'local'),
            'root' => env('UNIFILEMANAGER_ROOT', 'file-manager'),
            'visibility' => 'private',
        ],
        'public' => [
            'enabled' => false,
            'disk' => env('UNIFILEMANAGER_PUBLIC_DISK', 'public'),
            'root' => env('UNIFILEMANAGER_PUBLIC_ROOT', 'file-manager-public'),
            'visibility' => 'public',
        ],
    ],

    'storage_area_resolver' => ConfigStorageAreaResolver::class,

    'max_upload_size' => 10 * 1024,

    'max_upload_files' => 10,

    'max_directory_depth' => 7,

    'allowed_mimes' => [
        'image/jpeg', 'image/png', 'image/webp', 'image/gif', 'application/pdf',
        'text/plain', 'text/csv', 'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ],

    'allowed_extensions' => ['jpg', 'jpeg', 'png', 'webp', 'gif', 'pdf', 'txt', 'csv', 'doc', 'docx', 'xls', 'xlsx'],

    'preview_mimes' => ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'application/pdf', 'text/plain'],

    'preview_rate_limit' => 60,

    'thumbnails' => [
        'enabled' => true,
        'directory' => '.thumbnails',
        'max_dimension' => 360,
        'max_source_pixels' => 8_000_000,
    ],

    'authorizer' => DefaultFileManagerAuthorizer::class,
];
