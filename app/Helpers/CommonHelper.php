<?php

namespace App\Helpers;

use App\Models\SettingModel;
use Illuminate\Support\Collection;

class CommonHelper
{
    public function __construct()
    {
    }

    protected function getAllSettings(): Collection
    {
        return SettingModel::where('is_deleted', false)
            ->where('is_blocked', false)
            ->get();
    }

    protected function getSetting(string $key): ?string
    {
        return SettingModel::where('setting_key', $key)
            ->where('is_deleted', false)
            ->where('is_blocked', false)
            ->value('setting_value');
    }

    protected function siteName(string $append = ''): string
    {
        $siteName = $this->getSetting('site_name') ?? '';
        return $siteName . $append;
    }
}
