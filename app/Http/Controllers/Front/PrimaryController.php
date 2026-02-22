<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PrimaryController extends Controller
{
    protected array $dataArr = [];

    public function __construct()
    {
        $this->dataArr['company_name'] = 'Nutech Office System Pvt. Ltd.';
    }

    public function index(): View
    {
        $this->dataArr['active_page'] = 'home';
        return view('front.index', $this->dataArr);
    }

    public function about(): View
    {
        $this->dataArr['active_page'] = 'about';
        return view('front.about', $this->dataArr);
    }

    public function products(): View
    {
        $this->dataArr['active_page'] = 'products';
        return view('front.products', $this->dataArr);
    }

    public function services(): View
    {
        $this->dataArr['active_page'] = 'services';
        return view('front.services', $this->dataArr);
    }

    public function projects(): View
    {
        $this->dataArr['active_page'] = 'projects';
        return view('front.projects', $this->dataArr);
    }

    public function support(): View
    {
        $this->dataArr['active_page'] = 'support';
        return view('front.support', $this->dataArr);
    }

    public function contact(): View
    {
        $this->dataArr['active_page'] = 'contact';
        return view('front.contact', $this->dataArr);
    }

    public function quote(): View
    {
        $this->dataArr['active_page'] = 'quote';
        return view('front.quote', $this->dataArr);
    }
}