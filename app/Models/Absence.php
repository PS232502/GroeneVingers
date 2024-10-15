<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'absence',
        'startdate',
        'enddate'
    ];

    //get the schedule that has an absence report 
    public function personalschedules()
    {
        return $this->hasmany(PersonalSchedule::class);
    }
}
