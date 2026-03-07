<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'menu_name',
        'slug',
        'icon',
        'menu_order',
        'parent_id',
        'is_blocked',
        'is_deleted',
    ];

    public function parent()
    {
        return $this->belongsTo(MenuModel::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuModel::class, 'parent_id')->orderBy('menu_order', 'asc');
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }
}