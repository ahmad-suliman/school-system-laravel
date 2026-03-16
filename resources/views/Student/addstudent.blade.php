@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary display-3 font-weight-bolder mb-2">Add Student</h2>

        <div class="d-flex justify-content-center">
            <div class="bg-light w-50  shadow-sm p-3 mb-5 bg-white rounded">

                <form method="POST" action="{{ route('save.student') }}">
                    @csrf
                    @error ('full_name')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                      @error ('birth_date')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                      @error ('phone')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                      @error ('address')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                      @error ('class_id')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    <label for="full-name">Full Name :</label>
                    <input class="form-control" type="text" name="full_name" id="full-name" required>
                    <label for="birth-date">Birth Date :</label>
                    <input class="form-control" type="date" name="birth_date" id="birth-date" required>
                    <label for="phone">Phone Number :</label>
                    <input class="form-control" type="tel" name="phone" id="phone" required>
                    <label for="address">Address :</label>
                    <input class="form-control" type="text" name="address" id="address" required>
                    <label for="class">Class :</label>
                    <select class="form-control" name="class_id" id="class" required>
                        <option value="0">---</option>
                        @foreach ($classnames as $item)
                            <option value="{{$item->id}}">{{$item->class_name}}</option>
                        @endforeach
                    
                    </select>
                    <button class="btn btn-sm btn-primary mt-2"> + ADD </button>
                </form>
            </div>
        </div>
    </div>

@endsection