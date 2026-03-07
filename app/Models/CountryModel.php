<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name',
        'iso3',
        'numeric_code',
        'iso2',
        'phonecode',
        'capital',
        'currency',
        'currency_name',
        'currency_symbol',
        'tld',
        'native',
        'population',
        'gdp',
        'region',
        'subregion',
        'nationality',
        'area_sq_km',
        'postal_code_format',
        'postal_code_regex',
        'timezones',
        'translations',
        'latitude',
        'longitude',
        'emoji',
        'emojiU',
        'flag',
        'wikiDataId',
        'is_blocked',
        'is_deleted',
    ];

    public function states()
    {
        return $this->hasMany(StateModel::class);
    }

    public function cities()
    {
        return $this->hasManyThrough(CityModel::class, StateModel::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }
}