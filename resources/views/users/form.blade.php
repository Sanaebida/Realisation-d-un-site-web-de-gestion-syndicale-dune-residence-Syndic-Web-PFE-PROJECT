@extends('layouts.app')

@section('content')

<body >
    <div class="max-w-4xl p-6 mx-auto bg-gray-100 rounded-md shadow-md dark:bg-gray-800 mt-20">
        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif  
        <h1 class="text-xl font-bold text-gray-800 capitalize dark:text-white py-1 ">Ajouter un copropriétaire</h1>
        <br>  
        <form  method="post" action="{{ route('validate.form') }}" novalidate>
            @csrf
            <div class="form-group mb-2">
                <label class="text-gray-800">Nom Complet</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label class="text-gray-800" >Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-grid mt-3">
                <input type="submit" name="send" value="Ajouter" class="shadow bg-indigo-500 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
              </div>
        </div>
        
    </form>
</div>
</body>

@endsection
