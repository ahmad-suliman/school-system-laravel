<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
    
        $date = $request->date ?? now()->toDateString();
        $class_id = $request->class_id;
        $classes = Classroom::select('id', 'class_name')->get();

        $attendances = collect();

        if ($class_id) {
            $attendances = Attendance::with(['student.classroom'])
                ->whereDate('date', $date)
                ->whereHas('student', function ($query) use ($class_id) {
                    $query->where('class_id', $class_id);
                })
                ->get();
        }

        return view('Attendance.showAttendance', compact('attendances', 'classes', 'date', 'class_id'));
    }

    public function create(Request $request)
    {
        $date = $request->date ?? now()->toDateString();
        $class_id = $request->class_id;
        $classes = Classroom::select('id', 'class_name')->get();

        $students = collect();

        if ($class_id) {
            $students = Student::where('class_id', $class_id)
                ->select('id', 'full_name', 'class_id')
                ->get();
        }

        return view('Attendance.addAttendance', compact('students', 'classes', 'date', 'class_id'));
    }
    public function saveattendance(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'students' => 'required|array'
        ]);

        foreach ($request->students as $studentData) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $studentData['student_id'],
                    'date' => $request->date
                ],
                [
                    'status' => $studentData['status']
                ]
            );
        }

        return redirect()->back()->with('success', 'Attendance saved successfully!');
    }
}
