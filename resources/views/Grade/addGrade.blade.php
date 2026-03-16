@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary display-3 font-weight-bolder mb-2">Add Grade</h2>

        <div class="d-flex justify-content-center">
            <div class="bg-light w-50  shadow-sm p-3 mb-5 bg-white rounded">

                <form method="POST" action="{{ route('save.grade') }}">
                    @csrf
                     @error('student_id')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    @error('subject_id')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    @error('mark')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    <label for="name">Name :</label>
                    <select class="form-control" name="student_id" id="name" required>
                        <option value="0">---</option>
                        @foreach ($students as $student )
                            <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                        @endforeach
                    </select>
                    <label for="subject">Subject :</label>
                    <select class="form-control" name="subject_id" id="subject" required>
                        <option value="0">---</option>
                        @foreach ($subjects as $subject )
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                     <label for="mark">Mark :</label>
                    <input class="form-control" type="number" name="mark" id="mark" min="0" max="100" required>
                    
                    <button class="btn btn-sm btn-primary mt-2"> + ADD </button>
                </form>
            </div>
        </div>
    </div>

@endsection