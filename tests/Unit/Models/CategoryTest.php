<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use PreemStudio\Categories\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /** @test */
    public function morphs_to_a_notifiable(): void
    {
        $class = Category::create(['name' => 'My Category']);

        $this->assertInstanceOf(MorphTo::class, $class->categories());
    }
}
