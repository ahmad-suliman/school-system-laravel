@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary display-3 font-weight-bolder">Add Class</h2>
        <div class="d-flex justify-content-center">
            <div class="bg-light w-50  shadow-sm p-3 mb-5 bg-white rounded">
              
                <form method="POST" action="{{ route('admin.saveClass') }}">
                    @csrf
                    @error('classname')
                       <p class="text-danger text-center mb-2">{{ $message }}</p>  
                    @enderror
                   
                    <label for="classname">Class Name :</label>
                    <input class="form-control" type="text" name="classname" id="classname">
                    <label for="employee">Employee Name :</label>
                    <select class="form-control" name="employee" id="employee">
                        <option value="0">--</option>
                        @foreach ($employee as $item)
                             <option value="{{ $item->id }}">{{ $item->username }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-sm btn-primary mt-2"> + ADD </button>
                </form>
            </div>
        </div>
    </div>
@endsection