# UniFileManager Core

Shared file-management services for UniFileManager packages.

This package contains the backend logic that can be reused by Filament, Laravel, and Nova adapters:

- scoped storage areas
- path validation
- file and folder listing
- uploads
- rename, move, and delete operations
- previews and thumbnail generation
- MIME and extension checks
- authorization contracts

## Current status

This core package is staged inside the Filament package repository while the extraction is in progress.

The next release step is to move this folder into its own repository and publish it as:

```text
unifilemanager/core
```

After that, the Filament package can depend on `unifilemanager/core` and keep only Filament-specific UI, Livewire, field, and asset code.

## Run tests

From this package directory:

```bash
vendor/bin/pest --configuration=phpunit.xml --cache-directory=.pest-cache
```

## Project documents

- [Changelog](CHANGELOG.md)
