<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Enums\UserTypeEnums;
use App\Enums\UserGenderEnums;
use App\Models\UserModel;
use App\Models\StateModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\FrontSettingModel;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PrimaryController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = UserModel::where('email', $request->email)
            ->where('is_active', true)
            ->where('is_blocked', false)
            ->where('is_deleted', false)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        if (!in_array($user->user_type, [UserTypeEnums::admin->value, UserTypeEnums::super_admin->value])) {
            return response()->json([
                'status' => false,
                'message' => 'User type not allowed'
            ], 403);
        }

        Auth::login($user);
        session()->regenerate();

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'data' => [
                'user' => $user,
                'session_id' => session()->getId(),
            ]
        ]);
    }

    /* public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        // Send reset email
        Mail::raw("Your password reset token: $token", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Password Reset');
        });

        return response()->json([
            'status' => true,
            'message' => 'Password reset token sent to email'
        ]);
    }

    public function recoverPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $record = PasswordResetToken::where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$record) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid or expired token'
            ], 400);
        }

        $user = UserModel::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        $record->delete();

        // Automatically log the user in after password reset
        Auth::login($user);
        session()->regenerate();

        return response()->json([
            'status' => true,
            'message' => 'Password updated successfully and logged in',
            'data' => [
                'user' => $user,
                'session_id' => session()->getId()
            ]
        ]);
    } */

    public function stateList(Request $request)
    {
        $countryId = $request->post('country_id');

        $query = StateModel::query()
            ->where('is_deleted', 0)
            ->where('is_blocked', 0);

        if ($countryId) {
            $query->where('country_id', $countryId);
        }

        $states = $query->orderBy('name')->get();

        return response()->json([
            'status' => true,
            'message' => 'States retrieved successfully',
            'data' => $states
        ]);
    }

    public function uploadProfilePicture(Request $request)
    {
        /** @var UserModel $user */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && Storage::disk('public')->exists('assets/images/profile/'.$user->profile_image)) {
                Storage::disk('public')->delete('assets/images/profile/'.$user->profile_image);
            }

            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('assets/images/profile', $filename, 'public');

            $user->profile_image = $filename;
            $user->save();
            Auth::setUser($user->fresh());
        }

        return response()->json([
            'status' => true,
            'message' => 'Profile picture updated successfully',
            'data' => Auth::user()
        ]);
    }

    public function updateProfile(Request $request)
    {
        /** @var UserModel $user */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'phone' => 'required|digits_between:10,15',
            'address1' => 'required|string|min:3',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'nationality_id' => 'required|exists:countries,id',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Current password is incorrect'
            ]);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->nationality_id = $request->nationality_id;
        $user->save();
        Auth::setUser($user->fresh());

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully',
            'data' => Auth::user()
        ]);
    }

    public function updatePassword(Request $request)
    {
        /** @var UserModel $user */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Current password is incorrect'
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        Auth::setUser($user->fresh());

        return response()->json([
            'status' => true,
            'message' => 'Password updated successfully',
            'data' => Auth::user()
        ]);
    }

    public function users(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'username',
            2 => 'user_type',
            3 => 'first_name',
            4 => 'email',
            5 => 'phone',
            6 => 'gender',
            7 => 'status',
        ];

        $totalData = UserModel::where('is_deleted', 0)->count();
        $totalFiltered = $totalData;

        $limit = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));
        $orderColumnIndex = intval($request->input('order.0.column', 1));
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request->input('order.0.dir', 'asc');
        $search = $request->input('search.value', null);

        $query = UserModel::where('is_deleted', 0);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                ->orWhere('first_name', 'like', "%{$search}%")
                ->orWhere('middle_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%");
            });

            $totalFiltered = $query->count();
        }

        $users = $query->orderBy($orderColumn, $orderDir)
            ->offset($start)
            ->limit($limit)
            ->get();

        $data = [];
        foreach ($users as $user) {
            $nestedData = [
                'id' => $user->id,
                'username' => $user->username,
                'user_type' => $user->user_type,
                'first_name' => $user->first_name,
                'middle_name' => $user->middle_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'gender' => $user->gender,
                'status' => $user->is_active ? 1 : 0,
            ];
            $data[] = $nestedData;
        }

        return response()->json([
            'draw' => intval($request->input('draw', 1)),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ]);
    }

    public function addEditUser(Request $request)
    {
        $id = $request->post('id', 0);

        $rules = [
            'username'    => 'required|string|min:3|max:50|unique:users,username' . ($id ? ",$id" : ''),
            'email'       => 'required|email|max:100|unique:users,email' . ($id ? ",$id" : ''),
            'first_name'  => 'required|string|min:2|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name'   => 'required|string|min:2|max:50',
            'phone'       => 'nullable|digits_between:10,15',
            'user_type'   => 'required|string|in:' . implode(',', array_map(fn($type) => $type->value, UserTypeEnums::types())),
            'gender'      => 'required|string|in:' . implode(',', array_map(fn($gender) => $gender->value, UserGenderEnums::genders())),
            'password'    => ($id ? 'nullable' : 'required|string|min:6'),
            'address1'    => 'nullable|string|max:255',
            'address2'    => 'nullable|string|max:255',
            'country_id'  => 'nullable|exists:countries,id',
            'state_id'    => 'nullable|exists:states,id',
            'nationality_id' => 'nullable|exists:countries,id',
            'is_active'   => 'nullable|boolean',
            'is_blocked'  => 'nullable|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        if ($id) {
            $user = UserModel::find($id);
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found',
                ], 404);
            }
        } else {
            $user = new UserModel();
        }

        $user->username      = $request->username;
        $user->email         = $request->email;
        $user->first_name    = $request->first_name;
        $user->middle_name   = $request->middle_name;
        $user->last_name     = $request->last_name;
        $user->phone         = $request->phone;
        $user->user_type     = $request->user_type;
        $user->gender        = $request->gender;
        $user->address1      = $request->address1;
        $user->address2      = $request->address2;
        $user->country_id    = $request->country_id;
        $user->state_id      = $request->state_id;
        $user->nationality_id= $request->nationality_id;
        $user->is_active     = $request->has('is_active') ? $request->is_active : true;
        $user->is_blocked    = $request->has('is_blocked') ? $request->is_blocked : false;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return response()->json([
            'status' => true,
            'message' => $id ? 'User updated successfully' : 'User created successfully',
            'data' => $user,
        ]);
    }

    public function checkUsername(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:3', 'regex:/^[a-zA-Z0-9._-]+$/'],
            'id' => 'nullable|integer'
        ], [
            'username.regex' => 'Username can only contain letters, numbers, dots (.), underscores (_), and hyphens (-).'
        ]);

        $username = trim($request->username);
        $userId = $request->id ?? 0;

        $query = UserModel::withoutGlobalScopes()->where('username', $username);

        if ($userId) {
            $query->where('id', '!=', $userId);
        }

        if (!$query->exists()) {
            return response()->json(['available' => true]);
        }

        $suggestion = $username;
        $counter = 1;
        while (UserModel::withoutGlobalScopes()->where('username', $suggestion)->exists()) {
            $suggestion = $username . $counter;
            $counter++;
            if ($counter > 10) break;
        }

        return response()->json([
            'available' => false,
            'suggestion' => $suggestion
        ]);
    }

    public function deleteUsers(Request $request)
    {
        $ids = $request->post('ids', []);

        if (empty($ids) || !is_array($ids)) {
            return response()->json([
                'status' => false,
                'message' => 'No user selected for deletion',
            ], 422);
        }

        $updated = UserModel::whereIn('id', $ids)
            ->update(['is_deleted' => 1]);

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'User(s) deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete user(s)'
            ], 500);
        }
    }

    public function productCategories(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'parent_id',
            3 => 'description',
            4 => 'icon',
            5 => 'is_blocked',
        ];

        $totalData = ProductCategoryModel::withoutGlobalScope('active')->count();
        $totalFiltered = $totalData;

        $limit = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));
        $orderColumnIndex = intval($request->input('order.0.column', 1));
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request->input('order.0.dir', 'asc');
        $search = $request->input('search.value', null);

        $query = ProductCategoryModel::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('icon', 'like', "%{$search}%");
            });
            $totalFiltered = $query->count();
        }

        $categories = $query->orderBy($orderColumn, $orderDir)
            ->offset($start)
            ->limit($limit)
            ->get();

        $data = [];
        foreach ($categories as $cat) {
            $data[] = [
                'id' => $cat->id,
                'name' => $cat->name,
                'parent_name' => $cat->parent?->name ?? '',
                'description' => $cat->description,
                'icon' => $cat->icon,
                'is_blocked' => $cat->is_blocked,
            ];
        }

        return response()->json([
            'draw' => intval($request->input('draw', 1)),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ]);
    }

    public function deleteProductCategories(Request $request)
    {
        $ids = $request->post('ids', []);

        if (empty($ids) || !is_array($ids)) {
            return response()->json([
                'status' => false,
                'message' => 'No category selected for deletion',
            ], 422);
        }

        $updated = ProductCategoryModel::whereIn('id', $ids)
            ->update(['is_deleted' => 1]);

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'Category(s) deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete category(s)'
            ], 500);
        }
    }

    public function addEditProductCategory(Request $request)
    {
        $id = $request->post('id', 0);

        $rules = [
            'name'        => 'required|string|min:2|max:100|unique:product_categories,name' . ($id ? ",$id" : ''),
            'parent_id'   => 'nullable|exists:product_categories,id',
            'description' => 'nullable|string|max:500',
            'icon'        => 'nullable|string|max:100',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        if ($id) {
            $category = ProductCategoryModel::find($id);
            if (!$category) {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found',
                ], 404);
            }
        } else {
            $category = new ProductCategoryModel();
        }

        $category->name        = $request->name;
        $category->parent_id   = $request->parent_id ?: null;
        $category->description = $request->description;
        $category->icon        = $request->icon;
        $category->save();

        return response()->json([
            'status' => true,
            'message' => $id ? 'Category updated successfully' : 'Category created successfully',
            'data' => $category,
        ]);
    }

    public function productCategoryDetail(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:product_categories,id',
        ]);

        $category = ProductCategoryModel::with('parent')->findOrFail($request->id);

        return response()->json([
            'status' => true,
            'data' => [
                'id' => $category->id,
                'name' => $category->name,
                'parent_id' => $category->parent_id,
                'parent_name' => $category->parent?->name,
                'description' => $category->description,
                'icon' => $category->icon,
            ]
        ]);
    }

    public function products(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'title',
            2 => 'category_id',
            3 => 'price',
        ];

        $totalData = ProductModel::withoutGlobalScopes()->where('is_deleted', false)->count();
        $totalFiltered = $totalData;

        $limit = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));
        $orderColumnIndex = intval($request->input('order.0.column', 1));
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request->input('order.0.dir', 'asc');
        $search = $request->input('search.value', null);

        $query = ProductModel::withoutGlobalScopes()
                    ->where('is_deleted', false)
                    ->with('category', 'images');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('price', 'like', "%{$search}%");
            });
            $totalFiltered = $query->count();
        }

        $products = $query->orderBy($orderColumn, $orderDir)
                        ->offset($start)
                        ->limit($limit)
                        ->get();

        $data = [];
        foreach ($products as $product) {
            $thumbnail = $product->images->firstWhere('is_default', true);
            if (!$thumbnail && $product->images->isNotEmpty()) {
                $thumbnail = $product->images->first();
            }

            $data[] = [
                'id' => $product->id,
                'title' => $product->title,
                'category' => $product->category?->name ?? '',
                'price' => $product->price,
                'description' => $product->description,
                'image' => $thumbnail ? url('storage/assets/images/product/' . $thumbnail->image) : null,
            ];
        }

        return response()->json([
            'draw' => intval($request->input('draw', 1)),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ]);
    }

    public function deleteProducts(Request $request)
    {
        $ids = $request->post('ids', []);

        if (empty($ids) || !is_array($ids)) {
            return response()->json([
                'status' => false,
                'message' => 'No product selected for deletion',
            ], 422);
        }

        $updated = ProductModel::whereIn('id', $ids)->update(['is_deleted' => true]);

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'Product(s) deleted successfully'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to delete product(s)'
        ], 500);
    }

    public function addEditProduct(Request $request)
    {
        $id = $request->post('id', 0);

        $features = $request->post('features') 
            ? array_filter(array_map('trim', explode("\n", $request->post('features')))) 
            : [];

        $specifications = $request->post('specifications') 
            ? array_filter(array_map('trim', explode("\n", $request->post('specifications')))) 
            : [];

        $rules = [
            'category_id'    => 'required|exists:product_categories,id',
            'title'          => 'required|string|min:2|max:150',
            'price'          => 'required|numeric|min:0',
            'description'    => 'nullable|string|max:2000',
            'features'       => 'nullable|array',
            'specifications' => 'nullable|array',
            'images.*'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'default_image'  => 'nullable|integer',
        ];

        $request->merge([
            'features' => $features,
            'specifications' => $specifications,
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $product = $id ? ProductModel::find($id) : new ProductModel();
        if ($id && !$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ], 404);
        }

        $product->category_id    = $request->category_id;
        $product->title          = $request->title;
        $product->price          = $request->price;
        $product->description    = $request->description;
        $product->features       = $features;
        $product->specifications = $specifications;
        $product->save();

        $defaultIndex = intval($request->post('default_image', 0));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('assets/images/product', $filename, 'public');

                $product->images()->create([
                    'image' => $filename,
                    'is_default' => ($index === $defaultIndex),
                ]);
            }
        }

        if ($id && $product->images()->count() > 0) {
            $images = $product->images()->get();

            $images->each(function($img, $index) use ($defaultIndex) {
                $img->is_default = ($index === $defaultIndex);
                $img->save();
            });
        }

        return response()->json([
            'status'  => true,
            'message' => $id ? 'Product updated successfully' : 'Product created successfully',
            'data'    => $product->load('images'),
        ]);
    }

    public function productDetail(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
        ]);

        $product = ProductModel::with('images', 'category')->find($request->id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data'   => [
                'id'             => $product->id,
                'category_id'    => $product->category_id,
                'category'       => $product->category->name ?? null,
                'title'          => $product->title,
                'price'          => $product->price,
                'description'    => $product->description,
                'features'       => $product->features ?? [],
                'specifications' => $product->specifications ?? [],
                'images'         => $product->images->map(fn($img) => [
                    'url' => url('storage/assets/images/product/' . $img->image),
                    'is_default' => $img->is_default,
                ]),
            ],
        ]);
    }

    public function frontSettingDetail()
    {
        $frontSetting = FrontSettingModel::with([
            'sliders' => fn($q) => $q->where('is_deleted', false)->where('is_blocked', false)->orderBy('sort_order'),
            'services' => fn($q) => $q->where('is_deleted', false)->where('is_blocked', false)->orderBy('sort_order'),
            'clients' => fn($q) => $q->where('is_deleted', false)->where('is_blocked', false)->orderBy('sort_order'),
            'aboutStats' => fn($q) => $q->where('is_deleted', false)->where('is_blocked', false)->orderBy('sort_order')
        ])->first();

        return response()->json([
            'status' => true,
            'data' => $frontSetting
        ]);
    }

    public function updateFrontSetting(Request $request)
    {
        $data = $request->all();

        $frontSetting = FrontSettingModel::firstOrCreate([], [
            'site_title' => null,
            'meta_description' => null,
            'front_logo' => null,
            'favicon' => null,
            'footer_text' => null,
            'about_heading' => null,
            'about_desc' => null,
            'about_image' => null,
            'cta_heading' => null,
            'cta_subheading' => null,
            'cta_btn_text' => null,
            'cta_btn_url' => null,
            'cta_bg_image' => null,
            'is_blocked' => false,
            'is_deleted' => false
        ]);

        $fileFields = ['front_logo', 'favicon', 'about_image', 'cta_bg_image'];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $path = $file->store('public/assets/images/front_setting');
                $data[$field] = str_replace('public/', 'storage/', $path);
            }
        }

        $frontSetting->saveWithRelations([
            'front_setting' => [
                'site_title' => $data['site_title'] ?? $frontSetting->site_title,
                'meta_description' => $data['meta_description'] ?? $frontSetting->meta_description,
                'front_logo' => $data['front_logo'] ?? $frontSetting->front_logo,
                'favicon' => $data['favicon'] ?? $frontSetting->favicon,
                'footer_text' => $data['footer_text'] ?? $frontSetting->footer_text,
                'about_heading' => $data['about_heading'] ?? $frontSetting->about_heading,
                'about_desc' => $data['about_desc'] ?? $frontSetting->about_desc,
                'about_image' => $data['about_image'] ?? $frontSetting->about_image,
                'cta_heading' => $data['cta_heading'] ?? $frontSetting->cta_heading,
                'cta_subheading' => $data['cta_subheading'] ?? $frontSetting->cta_subheading,
                'cta_btn_text' => $data['cta_btn_text'] ?? $frontSetting->cta_btn_text,
                'cta_btn_url' => $data['cta_btn_url'] ?? $frontSetting->cta_btn_url,
                'cta_bg_image' => $data['cta_bg_image'] ?? $frontSetting->cta_bg_image,
            ],
            'sliders' => $data['sliders'] ?? [],
            'services' => $data['services'] ?? [],
            'clients' => $data['clients'] ?? [],
            'about_stats' => $data['about_stats'] ?? []
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Front settings updated successfully'
        ]);
    }
}