<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PaymentGateways extends Model
{
    use HasFactory;
    protected $table = "payment_gateways";

    public function payment_system(): HasOne{
        return $this->hasOne(PaymentSystems::class,"payment_system_id");
    }
}
