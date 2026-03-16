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

    <a href="{{ route('add.attendance') }}" class="btn btn-primary mb-5">+ Add Attendance</a>

    <form method="GET" action="{{ route('show.attendance') }}" class="mb-4">
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
                <button type="submit" class="btn btn-primary mr-2">Filter</button>
              
            </div>
        </div>
    </form>

    @if($attendances->count())
        <table id="myTable" class="display text-center">
            <thead class="text-center">
                <tr>
                    <th>#ID</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->id }}</td>
                        <td>{{ $attendance->student->full_name }}</td>
                        <td>{{ $attendance->student->classroom->class_name ?? 'N/A' }}</td>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ ucfirst($attendance->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(request()->has('class_id'))
        <div class="alert alert-warning text-center">
            No attendance found for this class on this date.
        </div>
    @endif
</div>

<script>
    $(document).ready(function () {
        if ($('#myTable').length) {
            let table = new DataTable('#myTable');
        }
    });

    setTimeout(function () {
        $('#success-alert').fadeOut('slow');
    }, 10000);
</script>

@endsection