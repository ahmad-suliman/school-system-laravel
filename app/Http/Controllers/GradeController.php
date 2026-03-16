<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(){
        $grades = Grade::with(['student','subject'])->get();
        $classes = Subject::with('classroom')->get();
        return view('Grade.showGrade',['grades'=>$grades,'classes'=>$classes]);
    }
    public function addgrade(){
        $students = Student::select('id','full_name')->get();
        $subjects = Subject::select('id','name')->get();

        return view('Grade.addGrade',['students'=>$students,'subjects'=>$subjects]);
    }
    public function savegrade(Request $request){
        $request->validate([
            'student_id'=>'required|exists:students,id',
            'subject_id'=>'required|exists:subjects,id',
            'mark'=>'required|numeric|min:0|max:100',
        ]);
        if($request->grade_id){
            $currentGrade = Grade::findOrFail($request->grade_id);
            $currentGrade->student_id =$request->student_id;
            $currentGrade->subject_id = $request->subject_id;
            $currentGrade->mark = $request->mark;
            $currentGrade->save();
            return back()->with('edit','grade was edited');
        }
        Grade::create([
            'student_id'=>$request->student_id,
            'subject_id'=>$request->subject_id,
            'mark'=>$request->mark,
        ]);
        return redirect()->route('show.grade')->with('add','grade was added');
    }
    public function editgrade($grade_id){
          $students = Student::select('id','full_name')->get();
        $subjects = Subject::select('id','name')->get();
        $grade = Grade::findOrFail($grade_id)->first();
        return view('Grade.editGrade',['students'=>$students,'subjects'=>$subjects,'grade'=>$grade]);
    }
    public function deletegrade($grade_id){
        $grade = Grade::findOrFail($grade_id)->delete();
        return back()->with('delete','Grade Successfuly Deleted');
    }
}
