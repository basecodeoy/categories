<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests;

use BaseCodeOy\Crate\TestBench\AbstractPackageTestCase;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

/**
 * @internal
 */
abstract class TestCase extends AbstractPackageTestCase
{
    #[\Override()]
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $blueprint): void {
            $blueprint->bigIncrements('id');
            $blueprint->string('name');
            $blueprint->string('email');
            $blueprint->string('password');
            $blueprint->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create('categories', function (Blueprint $blueprint): void {
            $blueprint->increments('id');
            $blueprint->string('name');
            $blueprint->string('slug');
            $blueprint->string('type')->default('default');
            NestedSet::columns($blueprint);
            $blueprint->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create('model_has_categories', function (Blueprint $blueprint): void {
            $blueprint->integer('category_id');
            $blueprint->morphs('model');
        });
    }

    #[\Override()]
    protected function getServiceProviderClass(): string
    {
        return \BaseCodeOy\Categories\ServiceProvider::class;
    }
}
