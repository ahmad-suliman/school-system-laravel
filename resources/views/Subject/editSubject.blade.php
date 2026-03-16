@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary display-3 font-weight-bolder mb-2">Edit Subject</h2>
        @if(session('edit'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('edit') }}

                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            <div class="bg-light w-50  shadow-sm p-3 mb-5 bg-white rounded">

                <form method="POST" action="{{ route('save.subject') }}">
                    @csrf
                   @error('name')
                    <p class="text-danger text-center">{{ $message }}</p>
                   @enderror
                      @error ('class_id')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                   <input type="hidden" name="id" value="{{ $subject->id }}">
                    <label for="name"> Name :</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $subject->name}}" required>
                  
                    <label for="class">Class :</label>
                    <select class="form-control" name="class_id" id="class" required>
                        <option value="0">---</option>
                        @foreach ($classrooms as $item)
                            <option value="{{$item->id}}" {{ $item->id == $subject->class_id ? 'selected':'' }}>{{$item->class_name}}</option>
                        @endforeach
                    
                    </select>
                    <button class="btn btn-sm btn-primary mt-2"> + EDIT </button>
                </form>
            </div>
        </div>
    </div>
<script>
     setTimeout(function () {
            $('#success-alert').fadeOut('slow');
        }, 10000);
</script>
@endsection