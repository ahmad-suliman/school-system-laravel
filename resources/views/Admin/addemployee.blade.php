@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary display-3 font-weight-bolder mb-2">Add Employee</h2>
         
        <div class="d-flex justify-content-center">
            <div class="bg-light w-50  shadow-sm p-3 mb-5 bg-white rounded">
              
                <form method="POST" action="{{ route('admin.saveemployee') }}">
                    @csrf
                
                    <label for="username">User Name :</label>
                    <input class="form-control" type="text" name="username" id="username">
                     <label for="password">Password :</label>
                    <input class="form-control" type="password" name="password" id="password">
                    <label for="role">Role :</label>
                    <select class="form-control" name="role" id="role">
                        <option value="0">---</option>
                        <option value="1">Admin</option>
                        <option value="2">Employee</option>
                    </select>
                    <button class="btn btn-sm btn-primary mt-2"> + ADD </button>
                </form>
            </div>
        </div>
    </div>
     <script> 
            $(document).ready(function () {
                let table = new DataTable('#myTable');
            });

        
        </script>
@endsection