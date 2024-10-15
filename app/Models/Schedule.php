<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'dayname',
        'starttime',
        'endtime',
        
    ];
    
    public function personalschedules()
    {
        return $this->hasmany(PersonalSchedule::class);
    }

}
