<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'rating', 'review', 'users_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
