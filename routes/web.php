<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialNetworkController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::prefix('administrator')->name('admin.')->group(function(){
    Route::get('/',function(){
        return view('admin.pages.dashboard');
    })->name('dashboard');    

    Route::put('setting/{id}/editSiteTitle',[SettingController::class,'editSiteTitle'])->name('setting.editSiteTitle');
    Route::put('setting/{id}/editSiteIcon',[SettingController::class,'editSiteIcon'])->name('setting.editSiteIcon');
    Route::put('setting/{id}/editSiteLogo',[SettingController::class,'editSiteLogo'])->name('setting.editSiteLogo');
    Route::put('setting/{id}/editLogoTitle',[SettingController::class,'editLogoTitle'])->name('setting.editLogoTitle');
    Route::put('user/{id}/deletePhoto',[UserController::class,'deletePhoto'])->name('user.deletePhoto');


    Route::resources([
        'post' => PostController::class,
        'page' => PageController::class,
        'social' => SocialNetworkController::class,
        'setting'=> SettingController::class,
        'category'=> CategoryController::class,
        'user'=> UserController::class,
        'section'=> SectionController::class,
        'media'=> MediaController::class
    ]);


});

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/profile',function(){
    return view('pages.profile.index');
});
Route::get('/profile/password',function(){
    return view('pages.profile.password');
});

Route::get('/page',function(){
    $post = Post::get()->last();
    return view('pages.page.index',compact('post'));
});


Route::get('/profile/new-password',function(){
    return view('pages.profile.new-password');
});
Route::get('/profile/change-password',function(){
    return view('pages.profile.change-password');
});

Route::get('/login',function(){
    return view('login');
})->name('login');
