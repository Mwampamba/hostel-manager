<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\Student;

class StudentRegistrationController extends Controller
{
    public function register_student()
    {
        $title = [
            'title' => 'Registration'
        ];

        return view('admin.student.register', $title);
    }

    public function save_student(StudentRequest $request)
    {
        $data = $request->validated();

        $student = new Student();

        $student->name = $data['name'];
        $student->phone = $data['phone'];
        $student->sex = $data['sex'];
        $student->programme = $data['programme'];
        $student->class = $data['class'];
        $student->collage = $data['collage'];

        $student->save();

        $student = Student::where('phone', $data['phone'])->first();

        if($student) {

            session(['student' => true, 'data' => $student->id]);

            return redirect()->route('createStudentBooking')->with('success', 'Registration complited!. You can now book your room.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function student_logout()
    {
        session()->forget(['student', 'data']);
        return redirect()->route('home');
    }
}
