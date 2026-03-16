<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Student Marks</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            margin: 20px;
        }

        h2 {
            margin-bottom: 30px;
        }

        h2,
        h4 {
            text-align: center;
            margin-bottom: 10px;
        }

        .info-table,
        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .info-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .grades-table th,
        .grades-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .grades-table th {
            background-color: #f2f2f2;
        }

        .section-title {
            margin-top: 25px;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2 style="margin-bottom:50px ">Student Marks</h2>



    <p> <strong>Student Name :</strong> {{ $student->full_name }} </p>
    <p><strong>Class :</strong> {{ $student->classroom->class_name }}</p>
    <p><strong> Generated at: </strong>{{ now()->format('Y-m-d H:i') }}</p>
    <div class="section-title">Grades</div>

    <table class="grades-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Mark</th>
            </tr>
        </thead>
        <tbody>
            @forelse($student->grades as $grade)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $grade->subject->name ?? 'N/A' }}</td>
                    <td>{{ $grade->mark }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No grades found</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    @php
        $average = $student->grades->avg('mark');
    @endphp
    <h4>average mark of {{ $student->full_name }} : <span style="color: green">{{ number_format($average,2) }}</span></h4>
</body>

</html>