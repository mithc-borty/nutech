<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\FrontSettingModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;

class PrimaryController extends Controller
{
    protected array $viewDataArr = [];

    public function __construct()
    {
        $frontSetting = FrontSettingModel::first();
        $this->viewDataArr['frontSetting'] = $frontSetting;
        $this->viewDataArr['site_title']      = $frontSetting->site_title ?? 'Nutech Office System Pvt. Ltd.';
        $this->viewDataArr['logo']            = $frontSetting->front_logo ?? 'front/img/logo.jpg';
        $this->viewDataArr['favicon']         = $frontSetting->favicon ?? 'front/img/favicon.ico';
        $this->viewDataArr['meta_description'] = $frontSetting->meta_description ?? '';
        $this->viewDataArr['footer_text']     = $frontSetting->footer_text ?? '';
    }

    public function index(): View
    {
        $this->viewDataArr['active_page'] = 'home';
        $this->viewDataArr['page_title'] = 'Home';
        $this->viewDataArr['sliders'] = $this->viewDataArr['frontSetting']
            ? $this->viewDataArr['frontSetting']->sliders()
                ->where('is_deleted', false)
                ->where('is_blocked', false)
                ->orderBy('sort_order')
                ->get()
            : collect();
        return view('front.index', $this->viewDataArr);
    }

    public function about(): View
    {
        $this->viewDataArr['active_page'] = 'about';
        $this->viewDataArr['page_title'] = 'About Us';
        $this->viewDataArr['aboutStats'] = $this->viewDataArr['frontSetting']
            ? $this->viewDataArr['frontSetting']->aboutStats()
                ->where('is_deleted', false)
                ->where('is_blocked', false)
                ->get()
            : collect();
        return view('front.about', $this->viewDataArr);
    }

    public function products(): View
    {
        $this->viewDataArr['active_page'] = 'products';
        $this->viewDataArr['page_title'] = 'Products';
        $this->viewDataArr['products'] = ProductModel::with('category', 'images')
            ->where('is_blocked', false)
            ->where('is_deleted', false)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('front.products', $this->viewDataArr);
    }

    public function services(): View
    {
        $this->viewDataArr['active_page'] = 'services';
        $this->viewDataArr['page_title'] = 'Services';
        return view('front.services', $this->viewDataArr);
    }

    public function projects(): View
    {
        $this->viewDataArr['active_page'] = 'projects';
        $this->viewDataArr['page_title'] = 'Projects';
        return view('front.projects', $this->viewDataArr);
    }

    public function support(): View
    {
        $this->viewDataArr['active_page'] = 'support';
        $this->viewDataArr['page_title'] = 'Support';
        return view('front.support', $this->viewDataArr);
    }

    public function contact(): View
    {
        $this->viewDataArr['active_page'] = 'contact';
        $this->viewDataArr['page_title'] = 'Contact';
        return view('front.contact', $this->viewDataArr);
    }

    public function quote(): View
    {
        $this->viewDataArr['active_page'] = 'quote';
        $this->viewDataArr['page_title'] = 'Quote';
        return view('front.quote', $this->viewDataArr);
    }
}