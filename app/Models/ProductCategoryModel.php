<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategoryModel extends Model
{
    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'icon',
        'is_blocked',
        'is_deleted',
    ];

    protected $casts = [
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductCategoryModel::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ProductCategoryModel::class, 'parent_id');
    }

    public function scopeBlocked($query)
    {
        return $query->where('is_blocked', true)
                     ->where('is_deleted', false);
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id')
                     ->where('is_blocked', false)
                     ->where('is_deleted', false);
    }
}