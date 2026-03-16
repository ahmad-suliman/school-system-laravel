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
        <a class="btn btn-primary m-4 text-light w-50" href="{{route('add.subject')}}"> + add Subject</a>
        <table id="myTable" class="display text-center">
            <thead class="text-center">
                <tr>
                    <th class="text-center">#Id</th>
                    <th class="text-center">Name</th>
                   <th class="text-center">Class Name</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($subjects as $item)
                     <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->name}}</td>
                        
                        <td>{{$item->classroom->class_name}}</td>
                        
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">

                                <a href="{{ route('edit.subject',$item->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i> Edit</a>

                                <form action="{{ route('delete.subject',$item->id) }}" method="POST" class="m-0 p-0">
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