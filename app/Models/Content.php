<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Content extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title', 'text', 'thumbnaile_id', 'vidio', 'slug', 'chapters_id', 'thumbnaile_url'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function chapters()
    {
        return $this->belongsTo(Chapter::class, 'chapters_id', 'id');
    }
}
