@extends('layout.master')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
@section('content')

    <div class="container mt-3 mb-5">
    @if(session('add'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('add') }}

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
        <a class="btn btn-primary m-4 text-light w-50" href="{{ route('add.grade') }}"> + add Grade</a>
        <table id="myTable" class="display text-center">
            <thead class="text-center">
                <tr>
                    <th class="text-center">#Id</th>
                    <th class="text-center">Name</th>
                   <th class="text-center">Subject</th>
                    <th class="text-center">Mark</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($grades as $grade)
                         <tr style="{{ $grade->mark < 50 ? "background-color: #f8c8c8 !important;": "background-color:#d9ffd9 !important;" }}">
                        <td>{{ $grade->id }}</td>
                        <td>{{ $grade->student->full_name }}</td>
                        
                        <td>{{ $grade->subject->name }}</td>
   
                        <td class="{{ $grade->mark < 50 ? "text-danger": "text-success" }}">{{ $grade->mark }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">

                                <a href="{{ route('edit.grade',$grade->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i> Edit</a>

                                <form method="POST" action="{{ route('delete.grade',$grade->id) }}" class="m-0 p-0">
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