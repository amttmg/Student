<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Student\ElequentStudent;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;
use  Illuminate\Contracts\Session\Session;
use App\Student;
use App\Course;

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
        return view('students/index', compact('courses'));
    }

    public function create()
    {
        return view('students/entry');
    }

    public function getByCagetory()
    {
        $course_ids = request('course');
        if ($course_ids) {
            $courses = Course::with('Students')->whereIn('id', $course_ids)->get();

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

        return view('students/edit', compact('student'));
    }

    public function update($id, StoreStudent $request)
    {
        $studentDetails = $this->student->getById($id);
        $this->authorize('edit', $studentDetails);
        $student = $this->student->update($id, $request->only(['name', 'address', 'phone', 'email',]));
        $student->courses()->sync(request('course'));
        $student->update();

        return redirect('student')->with(['success' => 'Successfully Updated']);
    }
}
