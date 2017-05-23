<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Student\ElequentStudent;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;
use  Illuminate\Contracts\Session\Session;
use App\Student;

class StudentController extends Controller
{
    public $student;
    public $course;

    public function __construct(StudentRepository $student, CourseRepository $course)
    {
        $this->middleware('auth');
        $this->student = $student;
        $this->course  = $course;
    }

    public function index()
    {
        $courses = $this->course->getAll();

        return view('students/index', compact('courses'));
    }

    public function create()
    {
        $courses = $this->course->getAll();

        return view('students/entry', compact('courses'));
    }

    public function getByCagetory()
    {
        $course_ids = request('course');
        if ($course_ids) {
            $courses = \App\Course::with('Students')->whereIn('id', $course_ids)->get();

            return view('students/studentlist', compact('courses'));
        } else {
            return "No Data Found";
        }

    }

    public function store(StoreStudent $request)
    {
        $studentArray            = $request->only(['name', 'address', 'phone', 'email',]);
        $studentArray['user_id'] = Auth()->id();
        $newstudent              = $this->student->create($studentArray);
        $newstudent->courses()->attach(request('course'));

        return redirect('student')->with(['success' => 'Successfully Saved']);
    }

    public function edit($id)
    {
        $student = $this->student->getByIdWithCourse($id);
        $courses = $this->course->getAll();
        return view('students/edit', compact('student', 'courses'));
    }

    public function update($id, StoreStudent $request)
    {
        $student = $this->student->update($id, $request->only(['name', 'address', 'phone', 'email',]));
        $student->courses()->sync(request('course'));
        $student->update();

        return redirect('student')->with(['success' => 'Successfully Updated']);
    }
}
