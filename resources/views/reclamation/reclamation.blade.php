@extends('layouts.app2')

@section('content')
<link rel="stylesheet" href="assets/css/styless.css">
<section class="mt-10">
    <div class="graphBox">
        <div class="box1">
          <div class="container">
             <h3 class="titlee">Ajouter votre reclamation</h3>
            <form action={{ route('store.form') }} method="post" novalidate>
             @csrf
             <input type="text" name="sujet" id="sujet" class="" placeholder="sujet"></br>
             <textarea type="text" name="comment" id ="comment" class="" placeholder="Write a comment"></textarea>
             <button type="submit" v-on:click="addItem()" class='primaryContained float-right'>Add Comment</button>
            </form>
          </div>
       </div>

<div class="box3">
    <div class="bg-white rounded-lg">
    <div class="">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-20 w-20"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        className="w-10"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
        />
      </svg>
    </div>
    <div class="">
      <div class="top-section flex flex-col sm:flex-row  space-x-5 text-center sm:text-left">
        <h1 class="font-bold text-md ">Syndic: Omar Elaouni </h1>
        <h3 class="text-gray-400">
          @OmElaouni <span></span>
        </h3>
      </div>
        <br>
      <div class="text-sm text-gray-600 font-semibold text-justify sm:text-left">
        <h3>Telephone : 06 03 50 58 51</h3>
        <br>
        <h3>Email  : Syndic1@gmail.com </h3>
        <br>
        <h3>Adress : rue 13, Romana , Tetouan</h3>
      </div>
      <div class="social-media mb-5">
        <ul class="flex justify-between mr-5 mt-2 ">
          <li class="hover:text-gray-700">
            <a href="#">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                />
              </svg>
            </a>
          </li>
          <li class="hover:text-gray-700">
            <a href="#">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
              </svg>
            </a>
          </li>
          <li class="hover:text-gray-700">
            <a href="#">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                />
              </svg>
            </a>
          </li>
          <li class="hover:text-gray-700">
            <a href="#">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"
                />
              </svg>
            </a>
          </li>
        </ul>
      </div>
      <br>
      <a href="https://github.com/chriskappa" class="bg-blue-300 rounded p-2 text-md font-bold " > FACEBOOK </a>
    </div>
    </div>
    </div>   
</div>
</section>
@endsection