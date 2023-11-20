@extends('layouts.default')
@section('page-content')
<section>
    <div class="h-screen flex">
        <div class="flex w-1/2 bg-gradient-to-tr from-gray-800 to-indigo-700 i justify-around items-center">
          <div>
            <h1 class="text-white font-bold text-4xl font-sans">SimpleSyndic</h1>
            <p class="text-white mt-1">Vous aidez organizer et gérez votre copropriété </p>
            <button type="submit" class="block w-28 bg-white text-indigo-800 mt-4 py-2 rounded-2xl font-bold mb-2">Bienvenue</button>
          </div>
        </div>
        <div class="flex w-1/2 justify-center items-center bg-white">

                    <form method="POST" action="{{ route('login') }}" class="bg-white">
                        @csrf
                        <h1 class="text-gray-800 font-bold text-2xl mb-1">Bienvenue</h1>
                        <p class="text-sm font-normal text-gray-600 mb-7">Bienvenue, veuillez vous connecter à votre compte.</p>
                        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                          </svg>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror pl-2 text-gray-700 outline-none border-none" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror pl-2 text-gray-700 outline-none border-none" name="password" required autocomplete="current-password" placeholder="Mot de pass">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                            <div class="py-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="text-sm font-normal text-gray-600 text-left" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            

                                <button type="submit" class="block w-full bg-indigo-500 mt-0 py-2 rounded-2xl text-white font-semibold mb-1">
                                    {{ __('Se Connecter') }}
                                </button>
                            
                            
                    </form>

</div>
</div>
</section>
@endsection
