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
        'is_default',
        'is_blocked',
        'is_deleted',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });

        static::saving(function ($image) {
            if ($image->is_default) {
                $image->newQuery()
                      ->where('product_id', $image->product_id)
                      ->where('id', '<>', $image->id)
                      ->update(['is_default' => false]);
            }
        });
    }
}