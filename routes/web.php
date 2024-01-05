<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\User\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('index-home');
Route::get('/san-pham/{slug}', [HomeController::class, 'productDetail'])->name('product-detail');
Route::get('/dashboard', function () {
    return view('pages.admin.chart.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    // Roles
    Route::resource('/roles', RolesController::class);
    Route::post('/roles/{role}/permissions', [RolesController::class, 'givePermission'])->name('roles.permissions');

    // Permissions
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/search', [PermissionController::class, 'index'])->name('permissions.search');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/edit/{permission}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/update/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/destroy/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    // User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/edit/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//    // Brand
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands/create', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/edit/{brand}', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/edit/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/destroy/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

    //Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/products/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    //Attribute
    Route::get('/products/attributes', [AttributeController::class, 'index'])->name('attributes.index');
    Route::get('/products/attributes/create', [AttributeController::class, 'create'])->name('attributes.create');
    Route::post('/products/attributes/store', [AttributeController::class, 'store'])->name('attributes.store');
    Route::get('/products/attributes/edit/{attribute}', [AttributeController::class, 'edit'])->name('attributes.edit');
    Route::put('/products/attributes/update/{attribute}', [AttributeController::class, 'update'])->name('attributes.update');
    Route::delete('/products/attributes/destroy/{attribute}', [AttributeController::class, 'destroy'])->name('attributes.destroy');
    //Banner
    Route::resource('/banners', BannerController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
