# 🎓 School System Laravel

A simple **School Management System** built with **Laravel** for managing students, classrooms, subjects, grades, and attendance.

This project was created as a **backend-focused practice project** to improve Laravel skills in:

- CRUD operations
- Eloquent relationships
- Authentication & roles
- Attendance tracking by date
- Grade management
- PDF export
- Admin / Employee dashboards

---

## ✨ Features

### 👤 Authentication & Roles
- Login system
- Role-based access:
  - **Admin**
  - **Employee**

### 🧑‍🎓 Student Management
- Add new students
- Edit student information
- Delete students
- View student details
- Assign students to classrooms

### 🏫 Classroom Management
- Create classrooms
- Assign employee/teacher to classroom
- View all classrooms

### 📚 Subject Management
- Add subjects
- Assign subjects to classrooms
- View subjects by classroom

### 📝 Grade Management
- Add grades for students
- Assign grades by subject
- View all grades
- View grades for a specific student
- Export student grades as **PDF**

### 📅 Attendance Management
- Mark attendance by date
- Set student status:
  - **Present**
  - **Absent**
- Filter attendance records by date
- Show attendance for current day or previous dates
- Show only students from a selected classroom

### 📊 Dashboard
- **Admin Dashboard**
  - Total Students
  - Total Employees
  - Total Subjects
  - Total Classrooms
  - Total Grades
  - Total Attendance Records
### 📄 PDF Export

The system supports exporting student grade reports as PDF using DomPDF.

 - Example use case:
 - Open a student profile
 - View all grades and subjects
 - Export the report as PDF

- **Employee Dashboard**
  - Overview of system data
  - Quick navigation to students, grades, attendance, and classrooms

### 🔍 UI / Table Features
- jQuery DataTables integration
- Search / pagination / sorting
- Bootstrap-based responsive UI

---

## 🛠️ Tech Stack

- **Laravel**
- **PHP**
- **MySQL**
- **Bootstrap**
- **jQuery**
- **DataTables**
- **DomPDF** (for PDF export)

---

## 🗃️ Database Structure

Main tables used in the project:

### `phoneuser`
- `id`
- `username`
- `password`
- `role` (`admin`, `employee`)

### `students`
- `id`
- `full_name`
- `birth_date`
- `phone`
- `address`
- `class_id`

### `classrooms`
- `id`
- `class_name`
- `employee_id`

### `subjects`
- `id`
- `name`
- `class_id`

### `grades`
- `id`
- `student_id`
- `subject_id`
- `mark`

### `attendances`
- `id`
- `student_id`
- `date`
- `status` (`present`, `absent`)

---

## 🔗 Eloquent Relationships

### Student
- belongsTo `Classroom`
- hasMany `Grade`
- hasMany `Attendance`

### Classroom
- hasMany `Student`
- belongsTo `Phoneuser` (employee)
- hasMany `Subject`

### Subject
- belongsTo `Classroom`
- hasMany `Grade`

### Grade
- belongsTo `Student`
- belongsTo `Subject`

### Attendance
- belongsTo `Student`

---

## 🚀 Installation

### 1) Clone the repository

- git clone https://github.com/ahmad-suliman/school-system-laravel.git
### 2) Go to the project folder
- cd school-system-laravel
### 4) Copy environment file
- copy .env.example .env
### 5) Seed fake data for testing
- php artisan db:seed --class=SchoolSystemSeeder
### 6) Start the development server
- php artisan serve
### 7) Now open:

 [http://127.0.0.1:8000]

###👨‍💻 Author

Ahmad Suliman

GitHub: ahmad-suliman

## Screenshots

<p align="center">
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/logi.png" width="32%" />
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-16%20183945.png" width="32%" />
  <img src="public/assets/img/school/Annotation 2026-03-17 084754.png" width="32%" />
</p>

<p align="center">
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-16%20184044.png" width="32%" />
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-16%20184127.png" width="32%" />
  
</p>

<p align="center">
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-16%20184220.png" width="32%" />
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-17%20090829.png" width="32%" />
 
</p>
<p align="center">
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-17%20090901.png" width="32%" />
<img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-17%20090925.png" width="32%" />
 
</p>

