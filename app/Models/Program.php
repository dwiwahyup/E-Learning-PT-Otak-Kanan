<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'nama', 'slug', 'jumlah_sks', 'tanggal_mulai', 'tanggal_selesai', 'metode_kegiatan', 'kegiatan', 'rincian_kegiatan', 'kriteria_peserta', 'informasi_tambahan', 'course_categories_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['nama']
            ]
        ];
    }

    public function kompetensi()
    {
        return $this->hasMany(Kompetensi::class, 'programs_id', 'id');
    }
}
