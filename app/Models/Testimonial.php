<?php

namespace App\Models;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'slug', 'email', 'rating', 'review', 'users_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['email']
            ]
        ];
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
