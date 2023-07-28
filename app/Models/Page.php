<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    use HasFactory;
    protected $table = 'page';
    protected $fillable = [
        'title',  
        'content',  
        'status',  
        'user_id'
    ];

    public function seo():HasOne{
        return $this->hasOne(Seo::class,'owner_id','id')->where('type',2);
    }
}
