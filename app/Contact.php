<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'name',  'email', 'mobileno', 'entity','institutionname','city', 'state','status'
    ];
}
