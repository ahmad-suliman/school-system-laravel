<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Support\Facades\Hash;

class SchoolSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // 1) Create Admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // 2) Create Employees
        $employees = User::factory()->count(5)->create([
            'role' => 'employee',
        ]);

        // 3) Create Classrooms (each classroom belongs to one employee)
        $classrooms = collect();

        foreach (range(1, 5) as $i) {
            $classrooms->push(
                Classroom::create([
                    'class_name' => 'Class ' . $i,
                    'employee_id' => $employees->random()->id,
                ])
            );
        }

        // 4) Create Students (10 students per class)
        $students = collect();

        foreach ($classrooms as $classroom) {
            $newStudents = Student::factory()->count(10)->create([
                'class_id' => $classroom->id,
            ]);

            $students = $students->merge($newStudents);
        }

        // 5) Create Subjects (same subjects for each class)
        $subjectNames = ['Math', 'English', 'Science', 'Arabic', 'Computer'];

        $subjects = collect();

        foreach ($classrooms as $classroom) {
            foreach ($subjectNames as $subjectName) {
                $subjects->push(
                    Subject::create([
                        'name' => $subjectName,
                        'class_id' => $classroom->id,
                    ])
                );
            }
        }

        // 6) Create Grades
        // Each student gets a grade for every subject in his class
        foreach ($students as $student) {
            $classSubjects = Subject::where('class_id', $student->class_id)->get();

            foreach ($classSubjects as $subject) {
                Grade::create([
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'mark' => fake()->numberBetween(50, 100),
                ]);
            }
        }
    }
    }
