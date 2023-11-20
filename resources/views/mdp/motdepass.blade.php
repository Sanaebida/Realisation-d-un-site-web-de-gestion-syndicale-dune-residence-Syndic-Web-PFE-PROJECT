@extends('layouts.app')
@section('content')

<div class="flex justify-center bg-white">
    
    <form method="POST" action={{ route('mdp.update')}} class="bg-white w-3/4">
        @csrf
        @method('PUT')
        <h1 class="text-gray-800 font-bold text-2xl mb-1">Pour changer mot de pass</h1>
        <p class="text-sm font-normal text-gray-600 mb-7">veuillez vous remplir la formulaire.</p>
        @if(Session::has('success'))
        <div class="alert alert-success text-center">
            {{Session::get('success')}}
        </div>
      @endif

    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
        </svg>
                <input id="old_password" type="password" class="form-control @error('password') is-invalid @enderror pl-2 text-gray-700 outline-none border-none" name="old_password" required autocomplete="new-password" placeholder="Mot De Pass Actuel">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>

    <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
        </svg>
                <input id="new_password" type="password" class="form-control pl-2 text-gray-700 outline-none border-none" name="new_password" required autocomplete="new-password" placeholder="Nouveau Mot De Pass">
            
    </div>
    <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
        </svg>
                <input id="confirm_password" type="password" class="form-control pl-2 text-gray-700 outline-none border-none" name="confirm_password" required autocomplete="new-password" placeholder="Confirmer Mot De Pass">
            
    </div>

    
                <button type="submit" class="block w-full bg-indigo-500 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">
                    {{ __('Confirmer') }}
                </button>
    </form>





</div>

@endsection