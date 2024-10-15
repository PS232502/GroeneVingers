<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'adress_id',
        'personal_schedule_id',
        'password',
        'firstname',
        'lastname',
        'dateofbirth',
        'phonenumber',
        'email',
        'function'
        
    ];

    //gets the adress of the person 
    public function adress()
    {
        return $this->belongsTo(Adress::class); 
    }

    //get the schedule of the person 
    public function personalSchedules()
    {
        return $this->hasMany(PersonalSchedule::class,'person_id');
    }
    
}
