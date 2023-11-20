@extends('layouts.app2')

@section('content')
<link rel="stylesheet" href="{{ asset('css/lilstyles.css') }}">
<link rel="stylesheet" href="assets/css/style.css">


    <div class="items-center">
    <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-11">

        <div class="main-container">

            <div class="cards">
              
              <div class="card card-2">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <p class="card__exit"><i class="fas fa-times"></i></p>
                <h2 class="card__title">il y-a {{$i}} dépenses aujourd'huis </h2>
                <p class="card__apply">
                  <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
                </p>
              </div>
              <div class="card card-3">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <p class="card__exit"><i class="fas fa-times"></i></p>
                <h2 class="card__title">ce mois-ci, nous avons dépensé {{$s->sum('prix')}} Dh</h2>
                <p class="card__apply">
                  <a class="card__link" href="{{ route('charts') }}">Voir Plus<i class="fas fa-arrow-right"></i></a>
                </p>
              </div>
              <div class="card card-4">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <p class="card__exit"><i class="fas fa-times"></i></p>
                <h2 class="card__title">il y a {{$c}} des depenses en cours </h2>
                <p class="card__apply">
                  <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
                </p>
              </div>
              <div class="card card-1">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <p class="card__exit"><i class="fas fa-times"></i></p>
                <h2 class="card__title">il y-a {{$r}} nouveaux cotisation aujourd'huis </h2>
                <p class="card__apply">
                  <a class="card__link" href="{{ route('cotisation.index') }}">Voir Plus <i class="fas fa-arrow-right"></i></a>
                </p>
              </div>
            </div>
          </div>




        <div class="relative overflow-x-auto sm:rounded-lg mt-5">
            
              <div class="overflow-x-auto">
                    <h6 class="px-1 py-1 text-gray-700 text-xl font-bold">
                        Votre liste des dépenses 
             </h6>
             
            </div>
                    <div class="py-4w-full">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-white text-indigo-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left ">Dépense</th>
                                        <th class="py-3 px-6 text-left">Date</th>
                                         <th class="py-3 px-6 text-left">Status</th>
                                         <th class="py-3 px-6 text-left">Prix</th>
                                         <th class="py-3 px-6 text-left">Reçus</th>
                                        <th class="py-3 px-6 text-right"></th>
                                    </tr>
            
                                </thead>
                  
        <tbody class=" text-xl border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                            @foreach($carnets as $item)
                                    <tr class="hover:bg-gray-100 text-sm">
                                        <td class="py-3 px-4 text-left text-gray-600">{{ $item->tache }}</td>
                                        <td class="py-3 px-2 text-left text-gray-600">{{ $item->date }}</td>
                                        <div class="status">                                    
                                            <td class="py-3 px-6 text-center"> 
                                            @if ($item->status=='complet')
                                               <span class="status complet">Complet</span>
                                            @elseif ($item->status=='incomplet')
                                               <span class="status incomplet">Incomplet</span>
                                            @else
                                               <span class="status en cours">En Cours</span>   
                                            @endif
                                            </td>
                                        </div>
                                        <td class="py-3 px-4 text-left text-gray-600">{{ $item->prix }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <img src="{{ asset($item->photo) }}" width= '70' height='70' class="items-center img img-responsive" />
                                        </td>

                                        <td class="py-3 px-4 text-left flex item-center justify-center">
                                            <a href="{{ route('carnet.edit',$item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            
                                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                                 <lord-icon
                                                  src="https://cdn.lordicon.com/wloilxuq.json"
                                                  trigger="hover"
                                                  colors="primary:#4030e8,secondary:#4030e8"
                                                  style="width:40px;height:40px">
                                                </lord-icon>
                                            </a>
                                        
                                            <form action="{{ route('carnet.destroy',$item->id) }}" method="Post">
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


   

<!--<div class="max-w-4xl p-6 mx-auto bg-gray-200 rounded-md shadow-md dark:bg-gray-800 mt-10">
        <div class="relative overflow-x-auto sm:rounded-lg">
            
                <div class="overflow-x-auto">
                    <h6 class="px-1 py-1 text-gray-700 text-xl font-bold">
                        Votre Carnet d'entretien
                     </h6>
                     <a class="Relative parent absolute top-0 right-0 bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-3 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button" href="{{ url('/carnet/create') }}">
                      Ajouter une tache </a>
                </div>
                    <div class="py-4w-full">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-white text-indigo-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Tache</th>
                                        <th class="py-3 px-6 text-left">Date</th>
                                        <th class="py-3 px-6 text-center">Status</th>
                                        <th class="py-3 px-4 text-left">Prix</th>
                                        <th class="py-3 px-6 text-left">receipt</th>
                                        <th class="py-3 px-4 text-right"></th>
                                    </tr>
            
                                </thead>
                                <tbody class=" text-l border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                @foreach($carnets as $item)
                                    <tr class="hover:bg-gray-100">
                                        <td class="py-3 px-4 text-left text-gray-600">{{ $item->tache }}</td>
                                        <td class="py-3 px-2 text-left text-gray-600">{{ $item->date }}</td>
                                        <div class="wrapper">
                                            <td class="py-3 px-6 text-center"> 
                                            @if ($item->status=='complet')
                                               <span class="complet">Complet</span>
                                            @elseif ($item->status=='incomplet')
                                               <span class="incomplet">Incomplet</span>
                                            @else
                                               <span class="attend">EnAttend</span>   
                                            @endif
                                            </td>
                                        </div>
                                        <td class="py-3 px-4 text-left text-gray-600">{{ $item->prix }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <img src="{{ asset($item->photo) }}" width= '70' height='70' class="items-center img img-responsive" />
                                        </td>

                                        <td class="py-3 px-4 text-left flex item-center justify-center">
                                            <a href="{{ route('carnet.edit',$item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            
                                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                                 <lord-icon
                                                  src="https://cdn.lordicon.com/wloilxuq.json"
                                                  trigger="hover"
                                                  colors="primary:#4030e8,secondary:#4030e8"
                                                  style="width:40px;height:40px">
                                                </lord-icon>
                                            </a>
                                        
                                            <form action="{{ route('carnet.destroy',$item->id) }}" method="Post">
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
                            </tbody>-->
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
</div>

        
@endsection
