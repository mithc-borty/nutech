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

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductCategoryModel::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ProductCategoryModel::class, 'parent_id');
    }
    
    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }
}