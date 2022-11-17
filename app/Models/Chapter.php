<?php

namespace App\Models;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'abstract', 'slug', 'course_categories_id'
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

    public function contents()
    {
        return $this->hasMany(Content::class, 'chapters_id', 'id');
    }
}
