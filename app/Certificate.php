<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    //
    protected $fillable = [
        'name',  'dateofcertification', 'courseid', 'serialkey', 'email',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid', 'id');
    }
}
