<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Config;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

final class Category extends Model
{
    use HasSlug;
    use NodeTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function tree(): array
    {
        return self::get()->toTree()->toArray();
    }

    public static function findByName(string $name): self
    {
        return self::where('name', $name)->orWhere('slug', $name)->firstOrFail();
    }

    public static function findById(int $id): self
    {
        return self::findOrFail($id);
    }

    public function categories(): MorphTo
    {
        return $this->morphTo();
    }

    public function entries(string $class): MorphToMany
    {
        return $this->morphedByMany($class, 'model', 'model_has_categories');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function getTable(): string
    {
        return Config::get('categorizable.tables.categories');
    }
}
