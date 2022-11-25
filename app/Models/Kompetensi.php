<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'slug', 'nama_kompetensi', 'programs_id',  'target_pengembangan_keterampilan', 'detail_pembelajaran', 'metode_asesment'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name_kompetensi']
            ]
        ];
    }
}
