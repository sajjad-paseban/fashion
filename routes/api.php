<?php

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api')->group(function(){
    Route::post('user/phonenumber/{phone}',function($phone){
        $user = User::where('phonenumber',$phone);
        if($user->count() > 0){
            return response(['userExist'=>1,'user_id'=>$user->get()->last()->id],200); // user has to enter the password
        }else{
            $result = User::create(['phonenumber'=>$phone]);
            session()->put('user_id',$result->id);
            return 0; // user must be refered to choose password for profile
        }
    });

    Route::post('user/{id}/password',function(Request $request, int $id){
        if(User::where('id',$id)->where('status',1)->count() == 0){
            return response(['status'=>0,'msg'=>'حساب کاربری شما غیر فعال می باشد'],200);
        }
        $user = User::find($id);
        $passwordVerification = Hash::check($request->get('password'),$user->password);

        if($passwordVerification){
            session()->put('user_id',$user->id);
            return response(['status'=>1],200);
        }else{
            return response(['status'=>0,'msg'=>'گذرواژه اشتباه می باشد'],200);
        }
    });

    Route::post('comment/store',function(Request $request){
        $comment = new Comment;
        $comment->user_id = session()->get('user_id');
        $comment->post_id = $request->get('post_id');
        $comment->comment = $request->get('comment');
        $comment->status = 0;

        if($comment->save()){
            return response(['status'=>1],200);
        }else{
            return response(['status'=>0,'msg'=>'نظر شما در سایت ثبت نگردید'],200);
        }
    });
});