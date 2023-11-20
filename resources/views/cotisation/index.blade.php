@extends('layouts.app')

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
                <h2 class="card__title">il y a {{$c}} des depenses en cours </h2>
                <p class="card__apply">
                  <a class="card__link" href="{{ route('carnet.index') }}">Voir Plus</a>
                </p>
              </div>
              <div class="card card-1">
                <div class="card__icon"></div>
                <p class="card__exit"></p>
                <h2 class="card__title">il y-a {{$r}} reclamations aujourd'huis </h2>
                <p class="card__apply">
                  <a class="card__link" href="{{ route('reclamation') }}">Voir Plus</a>
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
                    <a class="Relative parent absolute top-0 right-0 bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-3 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button" href="{{ route('create') }}">
                     Ajouter une cotisation 
                    </a>
                </div>
                    <div class="py-4w-full">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-white text-indigo-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left ">Nom</th>
                                         <th class="py-3 px-6 text-left">Montant</th>
                                         <th class="py-3 px-6 text-left">Date</th>

                                        <th class="py-3 px-6 text-right"></th>
                                    </tr>
            
                                </thead>
                  

                                <tbody class=" text-xl border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
            
                                    @foreach ($data as $i)
                                    <tr>
                                        <td class="py-3 px-6 text-left text-gray-600" >{{$i->nom}}</td>
                                        <td class="py-3 px-6 text-left text-gray-600">{{$i->frais}}</td>
                                        <td class="py-3 px-6 text-left text-gray-600" >{{$i->date}}</td>

                                        <td class="flex item-center justify-center">
                                            <a href="{{ route('cotisation.edit',$i->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            
                                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                                 <lord-icon
                                                  src="https://cdn.lordicon.com/wloilxuq.json"
                                                  trigger="hover"
                                                  colors="primary:#4030e8,secondary:#4030e8"
                                                  style="width:40px;height:40px">
                                                </lord-icon>
                                            </a>
                                        
                                            <form action="{{ route('cotisation.destroy',$i->id) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                        
                                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                                 <lord-icon
                                                   src="https://cdn.lordicon.com/exkbusmy.json"
                                                   trigger="hover"
                                                   colors="outline:#4030e8,primary:#646e78,secondary:#e4e4e4,tertiary:#1b1091"
                                                   stroke="60"
                                                   style="width:40px;height:40px">
                                                </lord-icon>
                                                
                                            </button>
                                            </form>
                                            </td>
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
