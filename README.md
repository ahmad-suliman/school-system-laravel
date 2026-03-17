# School Management System

A **School Management System** built with **Laravel 12**, **PHP 8.2**, and **MySQL**.  
This project helps manage **classrooms, students, subjects, attendance, grades, and user roles** in a simple and organized admin dashboard.

---

## 📌 Features

- User authentication (Admin / Employee roles)
- Dashboard overview
- Classroom management (CRUD)
- Student management (CRUD)
- Subject management (CRUD)
- Attendance management by date
- Grade management for students
- Role-based access control
- PDF export for reports
- Searchable and organized data tables

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12, PHP 8.2
- **Database:** MySQL
- **Frontend:** Blade, Bootstrap, jQuery
- **Tables:** DataTables
- **PDF Export:** DomPDF
---

## 📂 Database Structure

### Main Tables

- `phoneusers` → stores system users (admin / employee)
- `classrooms` → stores classroom information
- `students` → stores students and their classroom
- `subjects` → stores subjects for classrooms
- `attendances` → stores daily student attendance
- `grades` → stores student grades

---

## 🔗 Eloquent Relationships

### Classroom
- A classroom has many students
- A classroom has many subjects

### Student
- A student belongs to a classroom
- A student has many grades
- A student has many attendance records

### Subject
- A subject belongs to a classroom

### Grade
- A grade belongs to a student

### Attendance
- An attendance record belongs to a student

---

## 🚀 Installation

### 1. Clone the repository
```bash
git clone https://github.com/ahmad-suliman/school-system-laravel.git
cd school-system-laravel
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Copy environment file
```bash
copy .env.example .env
```

### 4. Generate application key
```bash
php artisan key:generate
```

### 5. Configure database
Create a MySQL database named:

```txt
schoolsystem
```

Then update your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=schoolsystem
DB_USERNAME=root
DB_PASSWORD=
```

---

### 6. Run migrations
```bash
php artisan migrate
```

### 7. Seed the database
```bash
php artisan db:seed --class=SchoolSystemSeeder
```

### 8. Install frontend dependencies
```bash
npm install
```

### 9. Compile assets
```bash
npm run dev
```

### 10. Start the server
```bash
php artisan serve
```

Open in browser:

```txt
http://127.0.0.1:8000
```

---

## 👤 Demo Login

> Update these if your seeder uses different credentials.

### Admin
- **Username:** admin
- **Password:** 12345678

### Employee
- **Username:** employee[check it inside DB]
- **Password:** 12345678

---

## 📸 Screenshots

<p align="center">
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/logi.png" width="32%" />
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-16%20183945.png" width="32%" />
  <img src="public/assets/img/school/Annotation 2026-03-17 084754.png" width="32%" />
</p>

<p align="center">
  
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-16%20184127.png" width="32%" />
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-16%20184154.png" width="32%" />
</p>

<p align="center">
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-16%20184220.png" width="32%" />
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-17%20090829.png" width="32%" />
 
</p>
<p align="center">
  <img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-17%20090901.png" width="32%" />
<img src="https://github.com/ahmad-suliman/school-system-laravel/blob/main/public/assets/img/school/Annotation%202026-03-17%20090925.png" width="32%" />
 
</p>

## 📄 PDF Reports

This project supports **PDF export** using **DomPDF** for generating printable school reports.

---

## ⚠️ Important Notes

- Make sure **XAMPP MySQL and Apache** are running.
- If you change the database structure, run:
```bash
php artisan migrate:fresh --seed
```

> **Warning:** This will delete all current database data and recreate it.

---

## 🧪 Future Improvements

Possible future enhancements for this project:

- Teacher management
- Parent portal
- Student report cards
- Fee/payment management
- Timetable scheduling
- Notifications system
- API version for mobile apps

---

## 📈 Project Purpose

This project was built as a **Laravel practice project** to improve skills in:

- Laravel MVC architecture
- Database relationships
- CRUD operations
- Authentication & authorization
- Eloquent ORM
- Blade templating
- PDF generation
- Real-world project structure

---

## 🙋 Author

**Ahmad Suliman**

- GitHub: [ahmad-suliman](https://github.com/ahmad-suliman)

---

## 📜 License

This project is open-source and available under the **MIT License**.



