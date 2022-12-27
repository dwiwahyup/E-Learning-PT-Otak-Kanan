<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleLogbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_periods_id', 'date'
    ];

    public function schedules()
    {
        return $this->belongsTo(SchedulePeriod::class, 'schedule_periods_id');
    }

    public function periods()
    {
        return $this->belongsTo(SchedulePeriod::class, 'schedule_periods_id', 'id');
    }
}
