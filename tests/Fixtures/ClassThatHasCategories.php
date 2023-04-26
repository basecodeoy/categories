<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Illuminate\Foundation\Auth\User;
use BombenProdukt\Categories\Concerns\HasCategories;

final class ClassThatHasCategories extends User
{
    use HasCategories;

    public $table = 'users';

    public $guarded = [];
}
