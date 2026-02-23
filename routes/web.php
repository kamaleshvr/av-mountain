<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/export-process', 'export-process')->name('export-process');
Route::get('/products', [App\Http\Controllers\ProductCategoryController::class, 'index'])->name('products');
Route::get('/products/{slug}', [App\Http\Controllers\ProductCategoryController::class, 'show'])->name('products.show');

Route::prefix('admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\AdminAuthController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
    
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');
        
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class, ['as' => 'admin']);
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class, ['as' => 'admin']);
        
        // Settings
        Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');
    });
});

Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
Route::redirect('/login', '/admin/login');

require __DIR__.'/check-config.php';
