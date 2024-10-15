<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PersonalSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'person_id',
        'absence_id',
        
    ];

    public function person()
    {
        return $this->belongsTo(Person::class,);
    }

    public function absences()
    {
        return $this->belongsTo(Absence::class);
    }

    public function schedules()
    {
        return $this->belongsTo(Schedule::class);
    }
}
