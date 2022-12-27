<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchedulePeriod extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'period_name', 'users_id', 'course_categories_id', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['period_name']
            ]
        ];
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function courses()
    {
        return $this->belongsTo(CourseCategory::class, 'course_categories_id', 'id');
    }
}
