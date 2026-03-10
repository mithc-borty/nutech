<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Helpers\CommonHelper;
use App\Enums\UserTypeEnums;
use App\Enums\UserGenderEnums;
use App\Models\UserModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use App\Models\FrontSettingModel;
use Illuminate\Support\Facades\Auth;

class PrimaryController extends Controller
{
    protected CommonHelper $commonHelper;
    protected UserModel $userModel;
    protected array $viewDataArr;

    public function __construct(CommonHelper $commonHelper, UserModel $userModel)
    {
        $this->commonHelper = $commonHelper;
        $this->userModel = $userModel;
        $this->viewDataArr  =   [];
    }

    public function login(Request $request): View
    {
        return view('admin.login');
    }

    public function forgotPassword(Request $request): View
    {
        return view('admin.forgot_password');
    }

    public function recoverPassword(Request $request): View
    {
        return view('admin.recover_password');
    }

    public function dashboard(Request $request): View
    {
        $this->viewDataArr['active_page']   =   'dashboard';
        return view('admin.dashboard', $this->viewDataArr);
    }

    public function users(Request $request): View
    {
        $this->viewDataArr['active_page']   =   'users';
        $this->viewDataArr['user_types'] = collect(UserTypeEnums::types())->mapWithKeys(function($type) {
            return [$type->value => match($type) {
                UserTypeEnums::super_admin => 'Super Administrator',
                UserTypeEnums::admin       => 'Administrator',
                UserTypeEnums::manager     => 'Manager',
                UserTypeEnums::editor      => 'Editor',
                UserTypeEnums::operator    => 'Operator',
                UserTypeEnums::user        => 'Regular User',
                UserTypeEnums::guest       => 'Guest',
                UserTypeEnums::support     => 'Support',
            }];
        })->toArray();

        $this->viewDataArr['genders'] = collect(UserGenderEnums::genders())->mapWithKeys(function($gender) {
            return [$gender->value => match($gender) {
                UserGenderEnums::male   => 'Male',
                UserGenderEnums::female => 'Female',
                UserGenderEnums::other  => 'Other',
            }];
        })->toArray();

        return view('admin.users', $this->viewDataArr);
    }

    public function addEditUser(Request $request, $id = 0): View
    {
        $this->viewDataArr['active_page']   =   'users';
        $user = $id > 0 ? UserModel::find($id) : null;

        $this->viewDataArr['user']      = $user;
        $this->viewDataArr['user_types'] = collect(UserTypeEnums::types())->mapWithKeys(function($type) {
            return [$type->value => match($type) {
                UserTypeEnums::super_admin => 'Super Administrator',
                UserTypeEnums::admin       => 'Administrator',
                UserTypeEnums::manager     => 'Manager',
                UserTypeEnums::editor      => 'Editor',
                UserTypeEnums::operator    => 'Operator',
                UserTypeEnums::user        => 'Regular User',
                UserTypeEnums::guest       => 'Guest',
                UserTypeEnums::support     => 'Support',
            }];
        })->toArray();

        $this->viewDataArr['genders'] = collect(UserGenderEnums::genders())->mapWithKeys(function($gender) {
            return [$gender->value => match($gender) {
                UserGenderEnums::male   => 'Male',
                UserGenderEnums::female => 'Female',
                UserGenderEnums::other  => 'Other',
            }];
        })->toArray();

        $this->viewDataArr['countries'] = CountryModel::orderBy('name')->get();
        $this->viewDataArr['states'] = $user && $user->country_id
            ? StateModel::where('country_id', $user->country_id)->orderBy('name')->get()
            : collect();

        return view('admin.add_edit_user', $this->viewDataArr);
    }

    public function productCategories(Request $request): View
    {
        $this->viewDataArr['active_page'] = 'product_categories';
        $this->viewDataArr['parent_categories'] = ProductCategoryModel::all();
        return view('admin.product_categories', $this->viewDataArr);
    }

    public function products(Request $request): View
    {
        $this->viewDataArr['active_page'] = 'products';
        $this->viewDataArr['categories'] = ProductCategoryModel::orderBy('name')->get();

        return view('admin.products', $this->viewDataArr);
    }

    public function addEditProduct(Request $request, $id = 0): View
    {
        $this->viewDataArr['active_page'] = 'products';
        $product = $id > 0 ? ProductModel::with('category')->find($id) : null;
        $this->viewDataArr['product'] = $product;
        $this->viewDataArr['categories'] = ProductCategoryModel::orderBy('name')->get();
        $this->viewDataArr['statuses'] = [
            0 => 'Inactive',
            1 => 'Active'
        ];

        return view('admin.add_edit_product', $this->viewDataArr);
    }

    public function settings(): View
    {
        $this->viewDataArr['active_page'] = 'settings';

        $frontSetting = FrontSettingModel::with([
            'sliders' => fn($q) => $q->where('is_deleted', false)
                                    ->where('is_blocked', false)
                                    ->orderBy('sort_order'),
            'services' => fn($q) => $q->where('is_deleted', false)
                                    ->where('is_blocked', false)
                                    ->orderBy('sort_order'),
            'clients' => fn($q) => $q->where('is_deleted', false)
                                    ->where('is_blocked', false)
                                    ->orderBy('sort_order'),
            'aboutStats' => fn($q) => $q->where('is_deleted', false)
                                        ->where('is_blocked', false)
        ])->first();

        $this->viewDataArr['frontSetting'] = $frontSetting;

        return view('admin.settings', $this->viewDataArr);
    }

    public function profile()
    {
        $this->viewDataArr['active_page']   =   'profile';
        view()->share('active_page', $this->viewDataArr['active_page']);
        $user = Auth::user();
        $this->viewDataArr['user']  =   $user;
        $this->viewDataArr['countries']  =   CountryModel::orderBy('name')->get();
        $countries = CountryModel::orderBy('name')->get();
        return view('admin.profile', $this->viewDataArr);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(url('admin/login'));
    }
}