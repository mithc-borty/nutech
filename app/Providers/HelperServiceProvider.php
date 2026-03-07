<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        require_once app_path('Helpers/global_helper.php');
    }

    public function boot(): void
    {
        
    }
}