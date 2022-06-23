<?php

use App\Http\Livewire\Admin\AdminCategory;
use App\Http\Livewire\Admin\AdminContactUs;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminPost;
use App\Http\Livewire\Admin\AdminSlider;
use App\Http\Livewire\Admin\AdminUser;
use App\Http\Livewire\Admin\AdminWeKown;
use App\Http\Livewire\Pages\Category;
use App\Http\Livewire\Pages\CategoryComponent;
use App\Http\Livewire\Pages\HomeComponent;
use App\Http\Livewire\Pages\PostComponent;
use App\Http\Livewire\Pages\ContactUs;
use App\Http\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class);
Route::get('/post',PostComponent::class);
Route::get('/contact-us',ContactUs::class);
Route::get('/category',Category::class);
Route::get('/category/{cate_id}',CategoryComponent::class);
// Route::get('/category/{cate_id}',CategoryComponent::class)->name('post.category');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/user/dashboard',UserDashboard::class)->name('user.dashboard');
});
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function (){
    Route::get('/admin/dashboard',AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/user',AdminUser::class)->name('admin.user');
    Route::get('/admin/post',AdminPost::class)->name('admin.post');
    Route::get('/admin/contact-us',AdminContactUs::class)->name('admin.contact_us');
    Route::get('/admin/category',AdminCategory::class)->name('admin.category');
    Route::get('/admin/we-kown',AdminWeKown::class)->name('admin.wekown');
    Route::get('/admin/slider',AdminSlider::class)->name('admin.slider');
});
