@extends('layouts.app2')

@section('content')
<link rel="stylesheet" href="{{ asset('css/lilstyles.css') }}">
<link rel="stylesheet" href="assets/css/style.css">


    <div class="items-center">
        <div class="main-container">

            <div class="cards">
              
              <div class="card card-2">
                <div class="card__icon"></div>
                <p class="card__exit"></p>
                <h2 class="card__title">il y-a {{$i}} dépenses aujourd'huis </h2>
                <p class="card__apply">
                  <a class="card__link" href="{{ route('carnet.index') }}">Voir Plus</a>
                </p>
              </div>
              <div class="card card-3">
                <div class="card__icon"></div>
                <p class="card__exit"></p>
                <h2 class="card__title">ce mois-ci, nous avons dépensé {{$s->sum('prix')}} Dh</h2>
                <p class="card__apply">
                  <a class="card__link" href="{{ route('charts') }}">Voir Plus</a>
                </p>
              </div>
              <div class="card card-4">
                <div class="card__icon"></div>
                <p class="card__exit"></p>
                <h2 class="card__title">il y a 2 depenses en cours </h2>
                <p class="card__apply">
                  <a class="card__link" href="{{ route('carnet.index') }}">Voir Plus</a>
                </p>
              </div>
              <div class="card card-1">
                <div class="card__icon"></div>
                <p class="card__exit"></p>
                <h2 class="card__title">il y-a 1 nouveau cotisation aujourd'huis </h2>
                <p class="card__apply">
                  <a class="card__link" href="{{ route('cotisation.index') }}">Voir Plus</a>
                </p>
              </div>
            </div>
          </div>

        <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-10">
            <div class="relative overflow-x-auto sm:rounded-lg">
            
                <div class="overflow-x-auto">
                    <h6 class="px-1 py-1 text-gray-700 text-xl font-bold">
                        Votre liste des cotisations 
                    </h6>
                </div>
                    <div class="py-4w-full">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto items-center">
                                <thead>
                                    <tr class="bg-white text-indigo-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left ">Nom</th>
                                         <th class="py-3 px-6 text-left">Prix</th>
                                         <th class="py-3 px-6 text-left">date</th>

                                        <th class="py-3 px-6 text-right"></th>
                                    </tr>
            
                                </thead>
                  

                                <tbody class=" text-xl border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
            
                                    @foreach ($data as $i)
                                    <tr>
                                        <td class="py-3 px-6 text-left text-gray-600" >{{$i->nom}}</td>
                                        <td class="py-3 px-6 text-left text-gray-600">{{$i->frais}}</td>
                                        <td class="py-3 px-6 text-left text-gray-600" >{{$i->date}}</td>

                                    </tr>
                                @endforeach
                                </tbody>


                                    
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
