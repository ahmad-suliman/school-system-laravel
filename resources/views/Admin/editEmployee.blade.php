@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary display-3 font-weight-bolder">Edit Employee</h2>
        <div class="d-flex justify-content-center">
            <div class="bg-light w-50  shadow-sm p-3 mb-5 bg-white rounded">
              
                <form method="POST" action="{{ route('admin.saveClass') }}">
                    @csrf
                    @error('classname')
                       <p class="text-danger text-center mb-2">{{ $message }}</p>  
                    @enderror
                   
                    <label for="classname">User Name :</label>
                    <input class="form-control" type="text" name="classname" id="classname" placeholder="{{ $employee->username }}">
                    <label for="employee">Role :</label>
                    <select class="form-control" name="employee" id="employee">
                        <option value="0">--</option>
                         <option value="1">Admin</option>
                          <option value="2">Employee</option>
                    </select>
                    <button class="btn btn-sm btn-primary mt-2"> + Edit </button>
                </form>
            </div>
        </div>
    </div>
@endsection