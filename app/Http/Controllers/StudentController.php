<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = \App\Course::get();
        echo "hello world";

        return view('students/index', compact('courses'));
    }
    public function create()
    {
        $courses = \App\Course::get();

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

    public function store()
    {
        $this->validate(request(), [
            'name'    => 'required',
            'address' => 'required',
            'phone'   => 'required',
            'email'   => 'required',
            'course'  => 'required',
        ]);
        $student          = new Student();
        $student->name    = request('name');
        $student->address = request('address');
        $student->phone   = request('phone');
        $student->email   = request('email');
        $student->user_id = Auth()->id();
        $student->save();

        $student->courses()->attach(request('course'));

        return redirect('student');

    }

    public function edit($id)
    {
        $student = Student::find($id);
        $courses = \App\Course::get();

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
