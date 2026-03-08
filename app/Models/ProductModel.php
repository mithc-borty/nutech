<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductModel extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'title',
        'price',
        'description',
        'features',
        'specifications',
        'is_blocked',
        'is_deleted',
    ];

    protected $casts = [
        'features' => 'array',
        'specifications' => 'array',
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategoryModel::class, 'category_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }
}