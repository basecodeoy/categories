<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Fixtures;

use BaseCodeOy\Categories\Concerns\HasCategories;
use Illuminate\Foundation\Auth\User;

final class ClassThatHasCategories extends User
{
    use HasCategories;

    public $table = 'users';

    public $guarded = [];
}
