<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('login');
});
Route::post('/login', [AdminController::class, 'login'])->name('Admin.login');
Route::post('/logout', [AdminController::class, 'logout'])->name('Admin.logout');
Route::middleware(['auth','role:admin'])->group(function () {
    //dashborad admin
    Route::get('/admin/dashborad', [AdminController::class, 'adminDahborad'])->name('admin.dashborad');
 
    //employee control for admin
    Route::get('/admin/addEmolyee', [AdminController::class, 'showEmployee'])->name('admin.showEmployee');
    Route::get('/admin/addemployee', [AdminController::class, 'addemployee'])->name('admin.addemployee');
    Route::post('/admin/saveemployee', [AdminController::class, 'saveemployee'])->name('admin.saveemployee');
    Route::delete('/admin/deleteemployee/{employee_id}', [AdminController::class, 'emloyeedestroy'])->name('admin.employeedelete');
    Route::get('/admin/editemployee/{employee_id}',[AdminController::class,'editEmployee'])->name('admin.editemployee');
    
});
//this routes will use it both admin/employee
Route::middleware('auth')->group(function(){
    Route::get('/employee/dashborad',[AdminController::class,'employeedashborad'])->name('employee.dashborad');
       //classroom for admin
    Route::get('/admin/classroom', [ClassController::class, 'index'])->name('admin.classroom');
    Route::get('/admin/addClass', [ClassController::class, 'addClass'])->name('admin.addClass');
    Route::post('/admin/saveClss', [ClassController::class, 'saveClass'])->name('admin.saveClass');
    Route::delete('/admin/deleteclass/{class_id}', [ClassController::class, 'destroy'])->name('admin.classdelete');
    //student CRUD 
     Route::get('/student',[StudentController::class,'index'])->name('show.student');
    Route::get('/student/addstudent',[StudentController::class,'addstuent'])->name('add.student');
    Route::post('/student/savestudent',[StudentController::class,'savestudent'])->name('save.student');
    Route::delete('/student/deletestudent/{student_id}',[StudentController::class,'desteoystudent'])->name('delete.student');
    Route::get('/student/editstudent/{student_id}',[StudentController::class,'editstudent'])->name('edit.student');
    Route::get('/student/viewstudent/{student_id}',[StudentController::class,'viewstudent'])->name('view.student');
    //subject CRUD 
    Route::get('/subject',[SubjectController::class,'index'])->name('show.subject');
    Route::get('/subject/addsubject',[SubjectController::class,'addsubject'])->name('add.subject');
    Route::post('/subject/savesubject',[SubjectController::class,'savesubject'])->name('save.subject');
    Route::delete('subject/deletesubject/{subject_id}',[SubjectController::class,'deletesubject'])->name('delete.subject');
    Route::get('/subject/editsubject/{subject_id}',[SubjectController::class,'editsubject'])->name('edit.subject');
    //Grade CRUD
    Route::get('/grade',[GradeController::class,'index'])->name('show.grade');
    Route::get('/grade/addgrade',[GradeController::class,'addgrade'])->name('add.grade');
    Route::post('/grade/savegrade',[GradeController::class,'savegrade'])->name('save.grade');
    Route::get('/grade/editgrade/{grade_id}',[GradeController::class,'editgrade'])->name('edit.grade');
    Route::delete('/grade/deletegrade/{grade_id}',[GradeController::class,'deletegrade'])->name('delete.grade');
    //Attendance CRUD
    Route::get('/attendance',[AttendanceController::class,'index'])->name('show.attendance');
    Route::get('/attendance/addattendance',[AttendanceController::class,'create'])->name('add.attendance');
    Route::post('/attendance/saveattendance',[AttendanceController::class,'saveattendance'])->name('save.attendance');
    //make pdf for student
    Route::get('/student/{id}/pdf', [StudentController::class, 'exportPdf'])->name('student.pdf');
    });
   