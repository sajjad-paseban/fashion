<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = [
        'name',
        'phonenumber',
        'email',
        'birthdate',
        'password',
        'photo_path',
        'is_admin',
        'status',
    ];
    
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
