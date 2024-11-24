<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Models;

use BaseCodeOy\Categories\Models\Category;
use Illuminate\Database\Eloquent\Relations\MorphTo;
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
