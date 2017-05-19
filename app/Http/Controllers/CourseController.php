<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
   public  function index(){
       $course= \App\Course::find(1);
       return $course->students;
   }
}
