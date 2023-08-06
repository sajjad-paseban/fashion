<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'title',    
        'parent_id',    
        'status'    
    ];
    
    public function category():HasOne{
        return $this->hasOne(Category::class,'id','parent_id');
    }

    public function children(): HasMany{
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function posts(): HasMany{
        return $this->hasMany(Post::class,'category_id','id');
    }
}
