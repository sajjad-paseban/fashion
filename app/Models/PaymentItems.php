<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentItems extends Model
{
    use HasFactory;
    protected $table = "payment_items";
    protected $guarded = [
        'id'
    ];
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
