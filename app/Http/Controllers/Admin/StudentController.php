<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Students'
        ];
        $students = Student::all();

        return view('admin.student.index', $title, compact('students'));
    }

    public function view_student_details($student_id)
    {
        $title = [
            'title' => 'Student details'
        ];
        $student = Student::findOrFail($student_id);

        if ($student) {
            return view('admin.student.details', $title, compact('student'));
        }
    }

    public function destroy($student_id)
    {
        $student = Student::findOrFail($student_id);

        if ($student) {

            dd($student);
            $student->delete();

            return redirect()->route('students')->with('success', 'Student has been deleted successfully!');
        }
    }
}
