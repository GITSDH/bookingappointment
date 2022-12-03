<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;


    protected $fillable = ['sub_number','com_name','ae_id','owner_id'];
    protected $with = ['owner'];

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id','id');
    }
}