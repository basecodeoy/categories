<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use BombenProdukt\Categories\Models\Category;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CategoryTest extends TestCase
{
    public function test_morphs_to_a_notifiable(): void
    {
        $class = Category::create(['name' => 'My Category']);

        self::assertInstanceOf(MorphTo::class, $class->categories());
    }
}
