<?php

declare(strict_types=1);

namespace PreemStudio\Categories;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-categories')
            ->hasConfigFile('laravel-categories')
            ->hasMigration('create_categories_tables')
            ->hasInstallCommand(fn (InstallCommand $command) => $command->publishConfigFile());
    }
}
