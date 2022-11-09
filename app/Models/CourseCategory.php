<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCategory extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'introduction', 'slug', 'image_url', 'image_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function mentors()
    {
        return $this->hasMany(Mentor::class, 'course_categories_id', 'id');
    }
}
