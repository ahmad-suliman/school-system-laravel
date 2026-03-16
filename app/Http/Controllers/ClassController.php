<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;

class ClassController extends Controller
{
     public function index(){
    $classroom = Classroom::withCount('students')->get();
        return view('Admin.classroom',['classroom'=>$classroom]);
    }
    public function addClass(){
        $employee = User::where('role','employee')->get();
        return view('admin.addclass',['employee'=>$employee]);
    }
    public function saveClass(Request $request){
            $request->validate([
                'classname' => 'required',
                'employee'=>'required|exists:users,id'
            ]);
            Classroom::create([
                'class_name' =>$request->classname,
                'employee_id'=>$request->employee
            ]);
             return redirect('/admin/classroom')->with('save','class name has been added');
    }
    public function destroy($class_id){
        $deleteClass = Classroom::findOrFail($class_id)->delete();
        return back()->with('delete','Class Has Been Deleted');
    }
}
