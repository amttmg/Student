<?php

namespace App;

use App\Events\StudentRegistered;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'email', 'user_id'];
    protected $events=[
       'saved'=>StudentRegistered::class,
    ];
    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }
}
