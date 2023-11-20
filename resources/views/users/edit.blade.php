@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="assets/css/style.css">

<body >
    <div class="max-w-4xl p-6 mx-auto bg-gray-200 rounded-md shadow-md dark:bg-gray-800 mt-20">
        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif  
        <h1 class="text-xl font-bold text-gray-800 capitalize dark:text-white py-1 ">Modifier :</h1>
        <br>  
        <form  method="post" action="{{ route('users.update',$data->id) }}" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label class="text-gray-800">Name</label>
                <input type="text" value="{{$data->name}}" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label class="text-gray-800" >Email</label>
                <input type="email" value="{{$data->email}}" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-grid mt-3">
                <input type="submit" name="send" value="Modifier" class="shadow bg-indigo-500 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
              </div>
        </div>
        
    </form>
</div>
</body>

@endsection
