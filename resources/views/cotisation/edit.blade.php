@extends('layouts.app')

@section('content')

<body >
    <div class="max-w-4xl p-6 mx-auto bg-gray-200 rounded-md shadow-md dark:bg-gray-800 mt-20">
        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif  
        <h1 class="text-xl font-bold text-gray-800 capitalize dark:text-white py-1 ">Modifier Cotisation</h1>
        <br>  
        <form  method="post" action="{{ route('cotisation.update',$data->id) }}" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label class="text-gray-800">Nom complet</label>
                <input type="text" value="{{$data->nom}}" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom">
                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label class="text-gray-800" >Les frais</label>
                <input type="frais" value="{{$data->frais}}" class="form-control @error('frais') is-invalid @enderror" name="frais" id="frais">
                @error('frais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label class="text-gray-800" >La date</label>
                <input type="date" value="{{$data->date}}" class="form-control @error('date') is-invalid @enderror" name="date" id="date">
                @error('date')
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
