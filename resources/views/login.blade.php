@extends('layout.master')
@section('content')

 <div class="container mt-5">
        <div class="text-center mb-5">
            <h2 class="text-primary font-weight-bolder display-3">Welcome To Ahmad Shcool</h2>
        </div>
       <div class="d-flex justify-content-center">
        <div class="bg-light w-50 shadow-sm p-3 mb-5 bg-white rounded">
            <form method="POST" action="{{route('Admin.login')}}">
                @csrf
                @error('login')
                    <p class="text-danger text-center">{{ $message }}</p>
                @enderror
                <label class="text-black-50" for="username">username :</label>
                <input class="form-control mb-2" type="text" name="username" id="username">
                 <label class="text-black-50" for="password">password :</label>
                <input class="form-control mb-3" type="password" name="password" id="password">
                <button class="btn btn-primary">Login</button>
            </form>
            </div>
        </div>
    </div>

@endsection
   