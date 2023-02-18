<?php

declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Foundation\Auth\User;
use PreemStudio\Categories\Concerns\HasCategories;

class ClassThatHasCategories extends User
{
    use HasCategories;

    public $table = 'users';

    public $guarded = [];
}
