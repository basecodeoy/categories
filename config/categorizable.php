<?php

declare(strict_types=1);

use BombenProdukt\Categories\Models\Category;

return [
    'models' => [
        'category' => Category::class,
    ],

    'tables' => [
        'categories' => 'categories',

        'model_has_categories' => 'model_has_categories',
    ],
];
