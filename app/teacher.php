<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $fillable = [
        'name',  'email', 'mobileno', 'entity','institutionname','certificationlevel',
    ];
}
