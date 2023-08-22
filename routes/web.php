<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialNetworkController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Section;
use App\Models\Setting;
use App\Models\SocialNetwork;
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

Route::middleware(['Authenticated','IsAdmin'])->group(function(){
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
});
    
Route::get('/', function () {
    $section = Section::get()->last();
    $setting = Setting::get()->last();
    $posts = Post::where('status',true)->orderBy('id')->get()->take(3);
    $networks = SocialNetwork::where('status',true)->get();
    return view('pages.home',compact('section','setting','posts','networks'));
})->name('home');
    
Route::get('/page',function(){
    $post = Post::get()->last();
    return view('pages.page.index',compact('post'));
})->name('page');

Route::prefix('profile')->name('profile.')->group(function(){
    Route::get('',[ProfileController::class,'index'])->name('index');
    Route::put('profil-action/{id}',[ProfileController::class,'profile_action'])->name('profile-action');
    Route::get('change-password',[ProfileController::class,'changePassword'])->name('change-password');
    Route::get('new-password',[ProfileController::class,'newPassword'])->name('new-password');
    Route::get('password',[ProfileController::class,'password'])->name('password');
    Route::get('delete-photo/{id}',[ProfileController::class,'delete_photo'])->name('delete-photo');
    Route::put('password_action',[ProfileController::class,'password_action'])->name('password-action');
    Route::put('change_password_action',[ProfileController::class,'changePassword_action'])->name('change-password-action');
});


Route::get('/login',function(){
    return view('login');
})->name('login')->middleware(['NotAuthenticated']);

Route::get('logout',function(){
    session()->flush();
    return to_route('home');
})->name('logout')->middleware('Authenticated');