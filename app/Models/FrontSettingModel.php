<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FrontSettingModel extends Model
{
    protected $table = 'front_settings';

    protected $fillable = [
        'site_title',
        'meta_description',
        'front_logo',
        'favicon',
        'footer_text',
        'about_heading',
        'about_desc',
        'about_image',
        'cta_heading',
        'cta_subheading',
        'cta_btn_text',
        'cta_btn_url',
        'cta_bg_image',
        'is_blocked',
        'is_deleted',
    ];

    protected $casts = [
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    public function sliders()
    {
        return $this->hasMany(FrontSlider::class, 'front_setting_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(FrontService::class, 'front_setting_id', 'id');
    }

    public function clients()
    {
        return $this->hasMany(FrontClient::class, 'front_setting_id', 'id');
    }

    public function aboutStats()
    {
        return $this->hasOne(FrontAboutStat::class, 'front_setting_id', 'id');
    }

    public function saveWithRelations(array $data)
    {
        DB::transaction(function () use ($data) {
            $this->fill($data['front_setting'] ?? []);
            $this->save();

            if (!empty($data['sliders'])) {
                $this->sliders()->delete();
                foreach ($data['sliders'] as $index => $slider) {
                    $this->sliders()->create(array_merge($slider, [
                        'sort_order' => $index,
                        'is_blocked' => $slider['is_blocked'] ?? false,
                        'is_deleted' => $slider['is_deleted'] ?? false,
                    ]));
                }
            }

            if (!empty($data['services'])) {
                $this->services()->delete();
                foreach ($data['services'] as $index => $service) {
                    $this->services()->create(array_merge($service, [
                        'sort_order' => $index,
                        'is_blocked' => $service['is_blocked'] ?? false,
                        'is_deleted' => $service['is_deleted'] ?? false,
                    ]));
                }
            }

            if (!empty($data['clients'])) {
                $this->clients()->delete();
                foreach ($data['clients'] as $index => $client) {
                    $this->clients()->create(array_merge($client, [
                        'sort_order' => $index,
                        'is_blocked' => $client['is_blocked'] ?? false,
                        'is_deleted' => $client['is_deleted'] ?? false,
                    ]));
                }
            }
        });
    }
}

class FrontSlider extends Model
{
    protected $table = 'front_sliders';
    protected $fillable = [
        'front_setting_id',
        'first_half_image',
        'second_half_image',
        'title',
        'subtitle',
        'description',
        'sort_order',
        'is_blocked',
        'is_deleted'
    ];
    protected $casts = [
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];
}

class FrontService extends Model
{
    protected $table = 'front_services';
    protected $fillable = [
        'front_setting_id',
        'icon',
        'title',
        'description',
        'sort_order',
        'is_blocked',
        'is_deleted'
    ];
    protected $casts = [
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];
}

class FrontClient extends Model
{
    protected $table = 'front_clients';
    protected $fillable = [
        'front_setting_id',
        'client_name',
        'logo',
        'industry',
        'sort_order',
        'is_blocked',
        'is_deleted'
    ];
    protected $casts = [
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];
}

class FrontAboutStat extends Model
{
    protected $table = 'front_about_stats';
    protected $fillable = [
        'front_setting_id',
        'heading',
        'description',
        'image',     
        'stats',
        'is_blocked',
        'is_deleted'
    ];
    protected $casts = [
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];
}