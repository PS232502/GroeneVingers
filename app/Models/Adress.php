<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'postalcode',
        'street',
        'housenumber'
    ];

    //get the person that has an adress  
    public function persons()
    {
        return $this->hasMany(Person::class);
    }
}
