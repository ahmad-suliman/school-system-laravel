@extends('layout.master')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>

@section('content')



    <div class="container mt-3 mb-5">
  @if(session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>
            </div>
        @endif
          @if(session('delete'))
            <div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('delete') }}

                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>
            </div>
        @endif
        <a class="btn btn-primary m-4 text-light w-50" href="{{route('add.student')}}"> + add Student</a>
        <table id="myTable" class="display text-center">
            <thead class="text-center">
                <tr>
                    <th>#id</th>
                    <th>Name</th>
                    <th>Birth Date</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($students as $student)
             
                     <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->birth_date }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->classroom->class_name ?? 'No Class' }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                               <a href="{{ route('view.student',$student->id) }}" class="btn btn-sm btn-info mr-2"><i class="fas fa-eye"></i> View</a>
                            <a href="{{ route('edit.student',$student->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i> Edit</a>
                         
                            <form method="POST"  action="{{ route('delete.student',$student->id) }}" class="m-0 p-0">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('are you sure?')">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @endforeach
               





            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            let table = new DataTable('#myTable');
        });
        setTimeout(function () {
            $('#success-alert').fadeOut('slow');
        }, 10000);
        setTimeout(function () {
            $('#danger-alert').fadeOut('slow');
        }, 10000);
    </script>

@endsection