@extends('layout.master')

@section('content')
    <div class="container mt-4 mb-5">

        <h2 class="text-center text-primary display-4 font-weight-bold mb-4">Student Info</h2>


        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Student Information</h4>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $student->id }}</p>
                <p><strong>Full Name:</strong> {{ $student->full_name }}</p>
                <p><strong>Birth Date:</strong> {{ $student->birth_date }}</p>
                <p><strong>Phone:</strong> {{ $student->phone }}</p>
                <p><strong>Address:</strong> {{ $student->address }}</p>
                <p><strong>Class:</strong> {{ $student->classroom->class_name ?? 'No Class Assigned' }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Grades</h4>
            </div>
            <div class="card-body">
                @if($student->grades->count())
                    <table class="table table-bordered table-striped text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Grade</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student->grades as $index => $grade)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $grade->subject->name ?? 'No Subject' }}</td>
                                    <td>{{ $grade->mark }}</td>
                                    <td>
                                        @if($grade->mark >= 50)
                                            <span class="badge badge-success">Pass</span>
                                        @else
                                            <span class="badge badge-danger">Fail</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    @php
                        $average = $student->grades->avg('mark');
                    @endphp

                    <div class="mt-3">
                        <h5>
                            <strong>Average Grade:</strong>
                            <span class="text-primary">{{ number_format($average, 2) }}</span>
                            <p class="{{ $average > 50 ? "text-success" : "text-danger" }} mt-2">
                                {{ $average > 50 ? "Success" : "Fail" }}</p>
                        </h5>
                    </div>
                @else
                    <div class="alert alert-warning text-center">
                        No grades found for this student.
                    </div>
                @endif
                <a href="{{ route('student.pdf', $student->id) }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>

    </div>
@endsection