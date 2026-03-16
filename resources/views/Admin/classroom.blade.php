@extends('layout.master')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
@section('content')

    <div class="container mt-3 mb-5">
        @if(session('save'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('save') }}

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
        <a class="btn btn-primary m-4 text-light w-50" href="{{route('admin.addClass')}}"> + add class</a>
        <table id="myTable" class="display text-center">
            <thead class="text-center">
                <tr>
                    <th class="text-center">#Id</th>
                    <th class="text-center">Class Name</th>
                    <th class="text-center">Total Student</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($classroom as $item)
               
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->class_name }}</td>
                        <td class="text-center">{{ $item->students_count }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">

                                
                                <form action="{{ route('admin.classdelete', $item->id) }}" method="POST" class="m-0 p-0">
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
