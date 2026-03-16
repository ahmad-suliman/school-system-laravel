@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary display-3 font-weight-bolder mb-2">Add Subject</h2>

        <div class="d-flex justify-content-center">
            <div class="bg-light w-50  shadow-sm p-3 mb-5 bg-white rounded">

                <form method="POST" action="{{ route('save.subject') }}">
                    @csrf
                    @error('name')
                    <p class="text-center text-danger">{{ $message }}</p>
                    @enderror
                    @error('class_id')
                    <p class="text-center text-danger">{{ $message }}</p>
                    @enderror
                    <label for="name">Name :</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                    <label for="class">Class :</label>
                    <select class="form-control" name="class_id" id="class" required>
                        <option value="0">---</option>
                        @foreach ($classrooms as $item)
                            <option value="{{$item->id}}">{{$item->class_name}}</option>
                        @endforeach
                    
                    </select>
                    <button class="btn btn-sm btn-primary mt-2"> + ADD </button>
                </form>
            </div>
        </div>
    </div>

@endsection