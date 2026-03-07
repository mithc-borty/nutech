<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PrimaryController extends Controller
{
    public function login(): View
    {
        return view('admin.login');
    }
}