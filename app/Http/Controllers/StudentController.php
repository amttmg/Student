<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Student\ElequentStudent;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;
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

    public function data()
    {
        return $this->student->getAll();
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
        $this->validate(request(), [
            'name'    => 'required',
            'address' => 'required',
            'phone'   => 'required',
            'email'   => 'required',
            'course'  => 'required',
        ]);
        $studentArray = [
            'name'    => $request->input('name'),
            'address' => $request->input('address'),
            'phone'   => $request->input('phone'),
            'email'   => $request->input('email'),
            'user_id' => Auth()->id(),
        ];
        $newstudent   = $this->student->create($studentArray);

        $newstudent->courses()->attach(request('course'));

        return redirect('student');

    }

    public function edit($id)
    {
        $student = $this->student->getById($id);
        $courses = $this->course->getAll();

        return view('students/edit', compact('student', 'courses'));
    }

    public function update(Student $student)
    {
        $this->validate(request(), [
            'name'    => 'required',
            'address' => 'required',
            'phone'   => 'required',
            'email'   => 'required',
            'course'  => 'required',
        ]);

        $student->name    = request('name');
        $student->address = request('address');
        $student->phone   = request('phone');
        $student->email   = request('email');
        $student->user_id = Auth()->id();
        $student->courses()->sync(request('course'));
        $student->update();

        return redirect('student');
    }
}
