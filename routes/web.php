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
use App\Models\PaymentGateways;
use App\Models\PaymentLogs;
use App\Models\Post;
use App\Models\Section;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\SocialNetwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
    $payment_gateways = PaymentGateways::where('status',true)->get();
    if($post->count()){
        $data = $post->first();
        $users_payments = PaymentLogs::where('post_id',$data->id)->where('status', true)->pluck('user_id')->toArray();
        return view('pages.post.index',compact('data','payment_gateways','users_payments'));
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

Route::post('payment/{user_id}/{post_id}',function(Request $request ,$user_id ,$post_id){
    
    if(!$request->get('gateway')){
        session()->flash('payment_error', 'یکی از درگاه های پرداخت را انتخاب نمایید');
        return back();
    }

    $payment_gateway = PaymentGateways::find($request->get('gateway'));
    $post = Post::find($post_id);


    $invoice_id = PaymentLogs::create([
        'post_id' => $post->id,
        'user_id' => $user_id,
        'amount' => $post->payment_item->amount,
        'status' => false
    ])->id;
    
    
    if($payment_gateway->payment_system->id == 1 && $payment_gateway->payment_system->status){
        

        $response = Http::post('https://panel.aqayepardakht.ir/api/v2/create',[
            'pin' => $payment_gateway->pin,
            'amount' => $post->payment_item->amount,
            'callback' => env('APP_URL',str_replace('/public','',request()->root())).'/payment/result/'.$user_id.'/'.$post_id.'/'.$invoice_id,
            'invoice_id' => $invoice_id,
        ]);

        return $response;

    }else if($payment_gateway->payment_system->id == 2 && $payment_gateway->payment_system->status){

    }else{
        session()->flash('payment_error', 'عملیات با خطا مواجه شد');
        return back();
    }

    return $payment_gateway->payment_system;



})->name('payment');
Route::get('er',function(){
    echo phpinfo();
});