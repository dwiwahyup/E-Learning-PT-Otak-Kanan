<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'motivation', 'image_url', 'course_categories_id', 'image_id', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function courses()
    {
        return $this->belongsTo(CourseCategory::class, 'course_categories_id', 'id');
    }
}
