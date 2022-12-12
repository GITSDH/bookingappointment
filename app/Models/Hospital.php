<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'logo',
        'location_id',
        'subscription_id',
        'type',
        'description',
    ];

    protected $with = ['location'];



    public function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }


    // public function doctors()
    // {
    //     return $this->hasMany(Doctor::class, 'hospital_id', 'id')
    //         ->join('users', 'users.id', 'doctors.user_id');
    // }


}