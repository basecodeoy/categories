<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;
use PreemStudio\Jetpack\TestBench\AbstractPackageTestCase;

abstract class TestCase extends AbstractPackageTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('type')->default('default');
            NestedSet::columns($table);
            $table->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create('model_has_categories', function (Blueprint $table) {
            $table->integer('category_id');
            $table->morphs('model');
        });
    }

    protected function getServiceProviderClass(): string
    {
        return \PreemStudio\Categories\ServiceProvider::class;
    }
}
