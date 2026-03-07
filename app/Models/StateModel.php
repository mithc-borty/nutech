<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateModel extends Model
{
    protected $table = 'states';

    protected $fillable = [
        'name',
        'country_code',
        'fips_code',
        'iso2',
        'iso3166_2',
        'type',
        'level',
        'parent_id',
        'native',
        'latitude',
        'longitude',
        'timezone',
        'translations',
        'flag',
        'wikiDataId',
        'population',
        'is_blocked',
        'is_deleted',
    ];

    public function country()
    {
        return $this->belongsTo(CountryModel::class);
    }

    public function cities()
    {
        return $this->hasMany(CityModel::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }
}