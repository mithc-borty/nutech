<?php

use App\Models\SettingModel;
use App\Models\MenuModel;
use App\Enums\UserTypeEnums;
use App\Enums\UserGenderEnums;

if (!function_exists('site_name')) {
    function site_name(string $append = ''): string
    {
        $siteName = SettingModel::where('setting_key', 'site_name')
            ->where('is_deleted', false)
            ->where('is_blocked', false)
            ->value('setting_value') ?? '';

        return $siteName . $append;
    }
}

if (!function_exists('gender')) {
    function gender(string $type = ''): string
    {
        if (!$type) {
            return '';
        }
        $enum = UserGenderEnums::tryFrom($type);
        
        return $enum ? $enum->genderLabel() : '';
    }

}

if (!function_exists('user_type')) {

    function user_type(string $type = ''): string
    {
        if (!$type) {
            return '';
        }
        $enum = UserTypeEnums::tryFrom($type);

        return $enum ? $enum->label() : '';
    }
}

if (!function_exists('menu_items')) {
    function menu_items($menuKey = null, $parentId = null)
    {
        $query = MenuModel::where('is_blocked', false)
            ->where('is_deleted', false);

        if ($menuKey !== null) {
            if (is_array($menuKey)) {
                $query->whereIn('menu_key', $menuKey);
            } else {
                $query->where('menu_key', $menuKey);
            }
            return $query->first();
        }

        if ($parentId !== null) {
            $query->where('parent_id', $parentId);
        }

        return $query->orderBy('menu_order', 'asc')->get();
    }
}