@extends('layout.master')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>

@section('content')
<div class="container mt-4 mb-5">

    <h2 class="text-center text-primary display-4 font-weight-bold mb-4">Employee Dashboard</h2>

    <!-- Top Statistic Cards -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">

        <div class="col mb-3">
            <div class="card bg-primary-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-primary" style="font-size: 40px"><i class="fas fa-book"></i></h5>
                    <h6 class="text-primary">Total Subjects</h6>
                    <h2 class="text-secondary">{{ $totalsubject }}</h2>
                    <a href="{{ route('show.subject') }}" class="btn btn-sm btn-outline-primary">Show Subjects</a>
                </div>
            </div>
        </div>

        <div class="col mb-3">
            <div class="card bg-warning-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-warning" style="font-size: 40px"><i class="fas fa-user-graduate"></i></h5>
                    <h6 class="text-warning">Total Students</h6>
                    <h2 class="text-secondary">{{ $totalstudent }}</h2>
                    <a href="{{ route('show.student') }}" class="btn btn-sm btn-outline-warning">Show Students</a>
                </div>
            </div>
        </div>

        <div class="col mb-3">
            <div class="card bg-success-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-success" style="font-size: 40px"><i class="fas fa-school"></i></h5>
                    <h6 class="text-success">Total Classes</h6>
                    <h2 class="text-secondary">{{ $totalclass }}</h2>
                    <a href="{{ route('admin.classroom') }}" class="btn btn-sm btn-outline-success">Show Classes</a>
                </div>
            </div>
        </div>

        <div class="col mb-3">
            <div class="card bg-danger-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-danger" style="font-size: 40px"><i class="fas fa-file-alt"></i></h5>
                    <h6 class="text-danger">Total Grades</h6>
                    <h2 class="text-secondary">{{ $totalgrades }}</h2>
                    <a href="{{ route('show.grade') }}" class="btn btn-sm btn-outline-danger">Show Grades</a>
                </div>
            </div>
        </div>

        <div class="col mb-3">
            <div class="card bg-secondary-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-secondary" style="font-size: 40px"><i class="fas fa-list"></i></h5>
                    <h6 class="text-secondary">Attendance Records</h6>
                    <h2 class="text-secondary">{{ $totalattendance }}</h2>
                    <a href="{{ route('show.attendance') }}" class="btn btn-sm btn-outline-secondary">Show Attendance</a>
                </div>
            </div>
        </div>

        <div class="col mb-3">
            <div class="card bg-info-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-info" style="font-size: 40px"><i class="fas fa-calendar-day"></i></h5>
                    <h6 class="text-info">Today's Attendance</h6>
                    <h2 class="text-secondary">{{ $todayattendance }}</h2>
                    <a href="{{ route('add.attendance') }}" class="btn btn-sm btn-outline-info">Mark Attendance</a>
                </div>
            </div>
        </div>

        <div class="col mb-3">
            <div class="card bg-success-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-success" style="font-size: 40px"><i class="fas fa-check-circle"></i></h5>
                    <h6 class="text-success">Present Today</h6>
                    <h2 class="text-secondary">{{ $presentToday }}</h2>
                    <a href="{{ route('show.attendance') }}" class="btn btn-sm btn-outline-success">View Attendance</a>
                </div>
            </div>
        </div>

        <div class="col mb-3">
            <div class="card bg-danger-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-danger" style="font-size: 40px"><i class="fas fa-times-circle"></i></h5>
                    <h6 class="text-danger">Absent Today</h6>
                    <h2 class="text-secondary">{{ $absentToday }}</h2>
                    <a href="{{ route('show.attendance') }}" class="btn btn-sm btn-outline-danger">View Attendance</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Students -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0"><i class="fas fa-user-graduate"></i> Recent Students</h5>
        </div>
        <div class="card-body">
            <table id="studentsTable" class="display text-center">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Student Name</th>
                        <th>Class</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentStudents as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->classroom->class_name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Attendance -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0"><i class="fas fa-list-check"></i> Recent Attendance</h5>
        </div>
        <div class="card-body">
            <table id="attendanceTable" class="display text-center">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentAttendance as $attendance)
                        <tr>
                            <td>{{ $attendance->id }}</td>
                            <td>{{ $attendance->student->full_name ?? 'N/A' }}</td>
                            <td>{{ $attendance->student->classroom->class_name ?? 'N/A' }}</td>
                            <td>{{ $attendance->date }}</td>
                            <td>
                                @if($attendance->status == 'present')
                                    <span class="badge badge-success">Present</span>
                                @elseif($attendance->status == 'absent')
                                    <span class="badge badge-danger">Absent</span>
                                @else
                                    <span class="badge badge-warning">Late</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Grades -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0"><i class="fas fa-file-alt"></i> Recent Grades</h5>
        </div>
        <div class="card-body">
            <table id="gradesTable" class="display text-center">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Student</th>
                        <th>Subject</th>
                        <th>Mark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentGrades as $grade)
                        <tr>
                            <td>{{ $grade->id }}</td>
                            <td>{{ $grade->student->full_name ?? 'N/A' }}</td>
                            <td>{{ $grade->subject->name ?? 'N/A' }}</td>
                            <td>{{ $grade->mark }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        if ($('#studentsTable').length) {
            new DataTable('#studentsTable');
        }

        if ($('#attendanceTable').length) {
            new DataTable('#attendanceTable');
        }

        if ($('#gradesTable').length) {
            new DataTable('#gradesTable');
        }
    });
</script>
@endsection