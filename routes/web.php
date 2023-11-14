<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentGatewaysController;
use App\Http\Controllers\PaymentItemsController;
use App\Http\Controllers\PaymentLogsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialNetworkController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use App\Models\Section;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\SocialNetwork;
use App\Models\User;
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

Route::middleware(['Initial','Authenticated','IsAdmin'])->group(function(){
    Route::prefix('administrator')->name('admin.')->group(function(){
        Route::get('/',function(){
            $data = (object)[
                'media_count' => Media::count(),
                'comment_count' => Comment::count(),
                'post_count' => Post::count(),
                'user_count' => User::count(),
                'posts' => Post::latest()->take(3)->get(),
                'pages' => Page::latest()->take(3)->get(),
                'comments' => Comment::latest()->take(3)->get()    
            ];
            return view('admin.pages.dashboard',compact('data'));
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
            'payment_gateways' => PaymentGatewaysController::class,
            'payment_items' => PaymentItemsController::class,
            'payment_logs' => PaymentLogsController::class,
            'setting'=> SettingController::class,
            'category'=> CategoryController::class,
            'user'=> UserController::class,
            'section'=> SectionController::class,
            'media'=> MediaController::class,
            'comment'=> CommentController::class
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

Route::get('/posts',function(){
    $posts = Post::where('status',true)->paginate(10);
    return view('pages.post.all',compact('posts'));
})->name('posts');

Route::get('/post/{slug}',function($slug){
    $post = Seo::where('type',1)->where('slug',$slug);
    if($post->count()){
        $data = $post->first();
        return view('pages.post.index',compact('data'));
    }

    return redirect('404');
    
})->name('post.index')->middleware('Authenticated');

Route::get('404',function(){
    return view('error.404');
});

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