<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Auth\User;
use PreemStudio\Categories\Concerns\HasCategories;

final class ClassThatHasCategories extends User
{
    use HasCategories;

    public $table = 'users';

    public $guarded = [];
}
