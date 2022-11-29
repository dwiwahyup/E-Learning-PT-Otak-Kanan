<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_photo', 'phone_numbers', 'campus', 'address', 'gender', 'profile_photo_id', 'NIM', 'users_id'
    ];
}
