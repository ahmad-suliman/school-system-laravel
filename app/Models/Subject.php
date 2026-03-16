<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
     use HasFactory;
    protected $fillable = [
        'name',
        'class_id',
    ];
   public function classroom(){
        return $this->belongsTo(Classroom::class,'class_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'grades')
                    ->withPivot('grade');
    }
}
