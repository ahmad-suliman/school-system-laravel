<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {

        $credentials =  $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == 'admin') {
                $request->session()->regenerate();
                return redirect('/admin/dashborad');
            } elseif (auth()->user()->role == 'employee') {
                $request->session()->regenerate();
                return redirect('/employee/dashborad');
            }
        }
        return back()->withErrors([
            'login' => 'Username or password is wrong'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function adminDahborad()
    {
        $totalemployee = User::where('role','employee')->count();
        $totalsubject = Subject::count();
        $totalstudent = Student::count();
        $totalclass = Classroom::count();
        $totalattendance = Attendance::count();
        $totalgrades = Grade::count();

        $presentToday = Attendance::whereDate('date', now()->toDateString())
            ->where('status', 'present')
            ->count();

        $absentToday = Attendance::whereDate('date', now()->toDateString())
            ->where('status', 'absent')
            ->count();

        $recentEmployees = User::where('role','employee')->latest()->take(5)->get();

        $recentStudents = Student::with('classroom')
            ->latest()
            ->take(5)
            ->get();

        $recentAttendance = Attendance::with(['student.classroom'])
            ->latest()
            ->take(5)
            ->get();

        $recentGrades = Grade::with(['student', 'subject'])
            ->latest()
            ->take(5)
            ->get();

        return view('Admin.dashborad', compact(
            'totalemployee',
            'totalsubject',
            'totalstudent',
            'totalclass',
            'totalattendance',
            'totalgrades',
            'presentToday',
            'absentToday',
            'recentEmployees',
            'recentStudents',
            'recentAttendance',
            'recentGrades'
        ));

        return view('Admin.dashborad');
    }
    public function employeedashborad()
    {
        $totalsubject = Subject::count();
        $totalstudent = Student::count();
        $totalclass = Classroom::count();
        $totalattendance = Attendance::count();
        $todayattendance = Attendance::whereDate('date', now()->toDateString())->count();
        $totalgrades = Grade::count();

        $presentToday = Attendance::whereDate('date', now()->toDateString())
            ->where('status', 'present')
            ->count();

        $absentToday = Attendance::whereDate('date', now()->toDateString())
            ->where('status', 'absent')
            ->count();

        $recentStudents = Student::with('classroom')
            ->latest()
            ->take(5)
            ->get();

        $recentAttendance = Attendance::with(['student.classroom'])
            ->latest()
            ->take(5)
            ->get();

        $recentGrades = Grade::with(['student', 'subject'])
            ->latest()
            ->take(5)
            ->get();

        return view('Employee.dashboard', compact(
            'totalsubject',
            'totalstudent',
            'totalclass',
            'totalattendance',
            'todayattendance',
            'totalgrades',
            'presentToday',
            'absentToday',
            'recentStudents',
            'recentAttendance',
            'recentGrades'
        ));
    }
    public function showEmployee()
    {
        $employees = User::where('role', '=', 'employee')->get();
        return view('admin.showEmployee', ['employees' => $employees]);
    }
    public function addemployee()
    {
        return view('admin.addemployee');
    }
    public function saveemployee(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:1,2',
        ]);
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.showEmployee')->with('success', 'Employee Was Added');
    }
    public function emloyeedestroy($employee_id)
    {
        $employee = User::findOrFail($employee_id)->delete();
        return back()->with('deleted', 'employee was deleted');
    }
    public function editEmployee($employee_id)
    {
        $employee = User::where('id', $employee_id)->first();
        $employees = User::where('role', 'employee')->get();
        return view('admin.editEmployee', ['employee' => $employee, 'employees' => $employees]);
    }
}
