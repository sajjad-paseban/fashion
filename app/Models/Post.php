<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'content',
        'status',
        'path'
    ];

    public function seo():HasOne{
        return $this->hasOne(Seo::class,'owner_id','id')->where('type',1);
    }

    public function category():HasOne{
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id')->where('status',1);
    }
}
