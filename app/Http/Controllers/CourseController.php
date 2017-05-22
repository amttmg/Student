<?php

namespace App\Http\Controllers;

use App\Repositories\Course\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * CourseController constructor.
     */
    private $course;
    public function __construct(CourseRepository $course)
    {
        $this->course=$course;
    }

    public  function index(){
       $course= $this->course->getById(1);
       return $course;
   }
}
