<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
        'state_code',
        'country_code',
        'type',
        'level',
        'parent_id',
        'latitude',
        'longitude', 
        'native',
        'population',
        'timezone',
        'translations',
        'flag',
        'wikiDataId',
        'is_blocked',
        'is_deleted',
    ];

    public function state()
    {
        return $this->belongsTo(StateModel::class);
    }

    public function country()
    {
        return $this->belongsTo(CountryModel::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }
}