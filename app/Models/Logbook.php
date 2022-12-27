<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'description', 'users_id', 'schedule_logbooks_id', 'description'
    ];

    public function schedules()
    {
        return $this->belongsTo(ScheduleLogbook::class, 'schedule_logbooks_id', 'id');
    }
}
