<?php

namespace App\Models;

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
}
