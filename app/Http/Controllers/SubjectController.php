<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('classroom')->get();
        return view('Subject.showSubject' ,['subjects'=>$subjects]);
    }
    public function addsubject()
    {
        $classrooms = Classroom::all();
        return view('Subject.addSubject', ['classrooms' => $classrooms]);
    }
    public function savesubject(Request $request){
        $request->validate([
            'name'=>'required|string',
            'class_id'=>'required|exists:classrooms,id'
        ]);
        if($request->id){
            $currentSubject = Subject::find($request->id);
            $currentSubject->name = $request->name;
            $currentSubject->class_id = $request->class_id;
            $currentSubject->save();
            return back()->with('edit','subject successfuly edit');
        }else{
        Subject::create([
            'name'=>$request->name,
            'class_id'=>$request->class_id,
        ]);
        return redirect()->route('show.subject')->with('success','subject successfuly added');
        }

    }
    public function editsubject($subject_id){
    $subject = Subject::findOrFail($subject_id);
      $classrooms = Classroom::all();
    return view('Subject.editSubject',['subject'=>$subject,'classrooms'=>$classrooms]);
    }
    public function deletesubject($subject_id){
        $subject = Subject::findOrFail($subject_id)->delete();
        return back()->with('delete','subject was deleted');
    }
}
