<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    //
    protected $fillable = [
        'name',  'dateofcertification', 'courseid', 'serialkey',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid', 'id');
    }
}
