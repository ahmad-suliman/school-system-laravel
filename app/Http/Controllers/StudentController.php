<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('Classroom')->get();
        return view('Student.showStudent', compact('students'));
    }
    public function addstuent()
    {
        $classnames = Classroom::select('id', 'class_name')->get();
        return view('Student.addstudent', compact('classnames'));
    }
    public function savestudent(Request $request)
    {
        //validate the data from user
        $request->validate([
            'full_name' => 'required|string',
            'birth_date' => 'required|date|before:today',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'class_id' => 'required|exists:classrooms,id',
        ]);
        //edit student
        if ($request->id) {
            $currentStudent = Student::findOrFail($request->id);
            $currentStudent->full_name = $request->full_name;
            $currentStudent->birth_date = $request->birth_date;
            $currentStudent->phone = $request->phone;
            $currentStudent->address = $request->address;
            $currentStudent->class_id = $request->class_id;
            $currentStudent->save();

            return back()->with('edit', 'student edit successfuly');
        } else {
            //add student
            Student::create([
                'full_name' => $request->full_name,
                'birth_date' => $request->birth_date,
                'phone' => $request->phone,
                'address' => $request->address,
                'class_id' => $request->class_id
            ]);
            return redirect()->route('show.student')->with('success', 'student added successfuly');
        }
    }
    public function editstudent($student_id)
    {
        $student = Student::where('id', $student_id)->first();
        $classname = Classroom::select('id', 'class_name')->get();
        return view('student.editstudent', ['student' => $student, 'classname' => $classname]);
    }
    public function desteoystudent($student_id)
    {
        $student = Student::findOrFail($student_id)->delete();
        return back()->with('delete', 'student was deleted');
    }
    public function viewstudent($student_id)
    {
        $student = Student::with(['classroom', 'grades.subject'])->findOrFail($student_id);
        return view('student.viewStudent', ['student' => $student]);
    }
    public function exportPdf($id)
    {
        $student = Student::with(['classroom', 'grades.subject'])->findOrFail($id);

        $pdf = Pdf::loadView('Student.pdf', compact('student'));

        return $pdf->stream('student_report_' . $student->id . '.pdf');
    }
}
