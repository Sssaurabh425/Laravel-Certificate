<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $fillable = [
        'name',  'dateofcertification', 'courseid', 'serialkey',
    ];
    public function course()
    {
        return $this->hasOne('App\Course','id','courseid');
    }
}
