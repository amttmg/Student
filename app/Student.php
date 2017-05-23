<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'email', 'user_id'];
    protected $events=[
        ""
    ];
    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }
}
