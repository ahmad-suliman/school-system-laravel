@extends('layout.master')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>

@section('content')

<div class="container mt-3 mb-5">

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <h2 class="text-center text-primary display-4 font-weight-bold mb-4">Add Attendance</h2>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('add.attendance') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="date">Attendance Date:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $date }}" required>
            </div>

            <div class="col-md-3">
                <label for="class_id">Select Class:</label>
                <select name="class_id" id="class_id" class="form-control" required>
                    <option value="">-- Select Class --</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{ $class_id == $class->id ? 'selected' : '' }}>
                            {{ $class->class_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Load Students</button>
            </div>
        </div>
    </form>

    @if($students->count())
        <form method="POST" action="{{ route('save.attendance') }}">
            @csrf

            <input type="hidden" name="date" value="{{ $date }}">
            <input type="hidden" name="class_id" value="{{ $class_id }}">

            <table id="myTable" class="display text-center">
                <thead class="text-center">
                    <tr>
                        <th>#ID</th>
                        <th>Student Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>
                                {{ $student->full_name }}
                                <input type="hidden" name="students[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                            </td>
                            <td>
                                <select name="students[{{ $student->id }}][status]" class="form-control" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                    
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-success mt-4 w-50">Save Attendance</button>
        </form>
    @elseif(request()->has('class_id'))
        <div class="alert alert-warning text-center">
            No students found in this class.
        </div>
    @endif
</div>

<script>
    $(document).ready(function () {
        if ($('#myTable').length) {
            let table = new DataTable('#myTable', {
                paging: false,
                info: false
            });
        }
    });

    setTimeout(function () {
        $('#success-alert').fadeOut('slow');
    }, 10000);
</script>

@endsection