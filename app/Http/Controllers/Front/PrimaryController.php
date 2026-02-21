<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PrimaryController extends Controller
{
    public function index(): View
    {
        return view('front.index', ['active_page' => 'home']);
    }

    public function about(): View
    {
        return view('front.about', ['active_page' => 'about']);
    }

    public function products(): View
    {
        return view('front.products', ['active_page' => 'products']);
    }

    public function service(): View
    {
        return view('front.service', ['active_page' => 'services']);
    }

    public function projects(): View
    {
        return view('front.projects', ['active_page' => 'projects']);
    }

    public function support(): View
    {
        return view('front.support', ['active_page' => 'support']);
    }

    public function contact(): View
    {
        return view('front.contact', ['active_page' => 'contact']);
    }

    public function quote(): View
    {
        return view('front.quote', ['active_page' => 'quote']);
    }
}