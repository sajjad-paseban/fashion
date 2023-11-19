<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentGateways extends Model
{
    use HasFactory;
    protected $table = "payment_gateways";
    protected $guarded = ["id"];
    public function payment_system(): BelongsTo{
        return $this->belongsTo(PaymentSystems::class,"payment_system_id");
    }
    public function getCreatedAtAttribute($value)
    {
        $date = \Morilog\Jalali\CalendarUtils::convertNumbers(\Morilog\Jalali\Jalalian::fromCarbon(Carbon::parse($value))->format('H:i:s | Y-m-d'));
        return $date;
    }
    public function getUpdatedAtAttribute($value)
    {
        $date = \Morilog\Jalali\CalendarUtils::convertNumbers(\Morilog\Jalali\Jalalian::fromCarbon(Carbon::parse($value))->format('H:i:s | Y-m-d'));
        return $date;
    }
}
