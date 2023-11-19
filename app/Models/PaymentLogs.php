<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentLogs extends Model
{
    use HasFactory;
    protected $table = "payment_log";

    protected $guarded = [
        'id'
    ];
    public function post(): BelongsTo{
        return $this->belongsTo(Post::class,'post_id');
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }
}
