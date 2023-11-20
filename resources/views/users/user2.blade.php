@extends('layouts.app')

@section('content')


<div class="items-center">
    <div class="max-w-4xl p-6 mx-auto bg-gray-200 rounded-md shadow-md dark:bg-gray-800 mt-20">
        <div class="relative overflow-x-auto sm:rounded-lg">
            
              <div class="overflow-x-auto">
                    <h6 class="px-1 py-1 text-gray-700 text-xl font-bold">
                        La liste des copropriétaires 
             </h6>
            
            </div>
                    <div class="py-4w-full">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-white text-indigo-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Nom</th>
                                        <th class="py-3 px-6 text-left">Email</th>
                                    </tr>
            
                                </thead>
                  
        <tbody class=" text-xl border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
            
            @foreach ($data as $i)
            <tr>
                <td class="py-3 px-6 text-left text-gray-600" >{{$i->name}}</td>
                <td class="text-indigo-500">{{$i->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>


@endsection
