<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BombenProdukt\Categories\Concerns\HasCategories;
use Illuminate\Foundation\Auth\User;

final class ClassThatHasCategories extends User
{
    use HasCategories;

    public $table = 'users';

    public $guarded = [];
}
