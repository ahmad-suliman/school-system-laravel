@extends('layout.master')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>

@section('content')
<div class="container mt-4 mb-5">

    <h2 class="text-center text-primary display-4 font-weight-bold mb-4">Admin Dashboard</h2>

    <!-- Top Statistic Cards -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">

        <!-- Employees -->
        <div class="col mb-3">
            <div class="card bg-danger-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-danger" style="font-size: 40px"><i class="fas fa-user-tie"></i></h5>
                    <h6 class="text-danger">Total Employees</h6>
                    <h2 class="text-secondary">{{ $totalemployee }}</h2>
                    <a href="{{ route('admin.showEmployee') }}" class="btn btn-sm btn-outline-danger">Show Employees</a>
                </div>
            </div>
        </div>

        <!-- Students -->
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

        <!-- Subjects -->
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

        <!-- Classes -->
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

        <!-- Grades -->
        <div class="col mb-3">
            <div class="card bg-info-subtle shadow-sm h-100 border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="text-info" style="font-size: 40px"><i class="fas fa-file-alt"></i></h5>
                    <h6 class="text-info">Total Grades</h6>
                    <h2 class="text-secondary">{{ $totalgrades }}</h2>
                    <a href="{{ route('show.grade') }}" class="btn btn-sm btn-outline-info">Show Grades</a>
                </div>
            </div>
        </div>

        <!-- Attendance -->
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

        <!-- Present Today -->
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

        <!-- Absent Today -->
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

    <!-- Recent Employees -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0"><i class="fas fa-user-tie"></i> Recent Employees</h5>
        </div>
        <div class="card-body">
            <table id="employeesTable" class="display text-center">
                <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="text-center">Employee Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentEmployees as $employee)
                        <tr>
                            <td class="text-center">{{ $employee->id }}</td>
                            <td class="text-center">{{ $employee->username }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                        <th class="text-center">#ID</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Class</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentStudents as $student)
                        <tr>
                            <td class="text-center">{{ $student->id }}</td>
                            <td class="text-center">{{ $student->full_name }}</td>
                            <td class="text-center">{{ $student->classroom->class_name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Attendance -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0"><i class="fas fa-list"></i> Recent Attendance</h5>
        </div>
        <div class="card-body">
            <table id="attendanceTable" class="display text-center">
                <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="text-center">Student</th>
                        <th class="text-center">Class</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentAttendance as $attendance)
                        <tr>
                            <td class="text-center">{{ $attendance->id }}</td>
                            <td class="text-center">{{ $attendance->student->full_name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $attendance->student->classroom->class_name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $attendance->date }}</td>
                            <td class="text-center">
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
        <div class="card-header bg-info text-white">
            <h5 class="mb-0"><i class="fas fa-file-alt"></i> Recent Grades</h5>
        </div>
        <div class="card-body">
            <table id="gradesTable" class="display text-center">
                <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="text-center">Student</th>
                        <th class="text-center">Subject</th>
                        <th class="text-center">Mark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentGrades as $grade)
                        <tr>
                            <td class="text-center" >{{ $grade->id }}</td>
                            <td class="text-center">{{ $grade->student->full_name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $grade->subject->name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $grade->mark }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        if ($('#employeesTable').length) {
            new DataTable('#employeesTable');
        }

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