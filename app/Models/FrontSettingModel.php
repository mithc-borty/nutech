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
        return $this->hasMany(FrontAboutStat::class, 'front_setting_id', 'id');
    }

    public function saveWithRelations(array $data)
    {
        DB::transaction(function () use ($data) {
            $this->fill($data['front_setting'] ?? []);
            $this->save();
            $now = now();

            if (!empty($data['sliders'])) {
                DB::table('front_sliders')->where('front_setting_id', $this->id)->delete();
                foreach ($data['sliders'] as $slider) {
                    DB::table('front_sliders')->insert(array_merge($slider, [
                        'front_setting_id' => $this->id,
                        'is_blocked' => $slider['is_blocked'] ?? false,
                        'is_deleted' => $slider['is_deleted'] ?? false,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]));
                }
            }

            if (!empty($data['services'])) {
                DB::table('front_services')->where('front_setting_id', $this->id)->delete();
                foreach ($data['services'] as $service) {
                    DB::table('front_services')->insert(array_merge($service, [
                        'front_setting_id' => $this->id,
                        'is_blocked' => $service['is_blocked'] ?? false,
                        'is_deleted' => $service['is_deleted'] ?? false,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]));
                }
            }

            if (!empty($data['clients'])) {
                DB::table('front_clients')->where('front_setting_id', $this->id)->delete();
                foreach ($data['clients'] as $client) {
                    DB::table('front_clients')->insert(array_merge($client, [
                        'front_setting_id' => $this->id,
                        'is_blocked' => $client['is_blocked'] ?? false,
                        'is_deleted' => $client['is_deleted'] ?? false,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]));
                }
            }

            if (!empty($data['about_stats'])) {
                DB::table('front_about_stats')->where('front_setting_id', $this->id)->delete();
                foreach ($data['about_stats'] as $stat) {
                    DB::table('front_about_stats')->insert(array_merge($stat, [
                        'front_setting_id' => $this->id,
                        'is_blocked' => $stat['is_blocked'] ?? false,
                        'is_deleted' => $stat['is_deleted'] ?? false,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]));
                }
            }
        });
    }
}

class FrontSlider extends Model
{
    protected $table = 'front_sliders';
    protected $fillable = ['front_setting_id','first_half_image','second_half_image','title','subtitle','description','sort_order','is_blocked','is_deleted'];
}

class FrontService extends Model
{
    protected $table = 'front_services';
    protected $fillable = ['front_setting_id','icon','title','description','sort_order','is_blocked','is_deleted'];
}

class FrontClient extends Model
{
    protected $table = 'front_clients';
    protected $fillable = ['front_setting_id','client_name','logo','industry','sort_order','is_blocked','is_deleted'];
}

class FrontAboutStat extends Model
{
    protected $table = 'front_about_stats';
    protected $fillable = ['front_setting_id','title','icon','value','sort_order','is_blocked','is_deleted'];
}