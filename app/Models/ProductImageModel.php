<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImageModel extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'image',
        'is_blocked',
        'is_deleted',
    ];

    protected $casts = [
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }
}