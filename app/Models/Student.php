<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
      protected $table = 'students';
    protected $fillable = [
        'full_name',
        'birth_date',
        'phone',
        'address',
        'class_id'
    ];
    public function classroom(){
        return $this->belongsTo(Classroom::class,'class_id');
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'grades')
                    ->withPivot('grade');
    }
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
    public function grades()
{
    return $this->hasMany(Grade::class,'student_id');
}
}
