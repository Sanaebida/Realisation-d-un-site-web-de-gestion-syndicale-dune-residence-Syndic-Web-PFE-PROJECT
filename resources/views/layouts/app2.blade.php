<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
</head>
<body>
   
<main>
    @yield('contentt')
</main>
<div class="navigation">
    @auth
    <ul>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="business"></ion-icon>
                </span>
                <span class="title text-lg">Syndic Web</span>  
            </a>
        </li>
        <li>
            <a href="{{ route('carnet.index') }}">
                <span class="icon"><ion-icon name="paper"></ion-icon></span>
                <span class="title">Gestion de depense </span>
                
            </a>
        </li>
        <li>
            <a href="{{ route('cotisation.index') }}">
                <span class="icon"><ion-icon name="card"></ion-icon></span>
                <span class="title">Gestion de cotisaion</span>
                
            </a>
        </li>
        <li>
            <a href="{{ route('charts') }}">
                <span class="icon"><ion-icon name="stats"></ion-icon></span>
                <span class="title">Charts</span>
                
            </a>
        </li>
         
        <li>
            <a href="{{ route('reclamation') }}">
                <span class="icon"><ion-icon name="chatbubbles"></ion-icon></span>
                <span class="title">Reclamation</span>
                
            </a>
        </li>
        <li>
            <a href="#">
              <span class="icon"><ion-icon name="log-out"></ion-icon></span>
              <span class="title">logout</span>
            
            </a>
        </li>
    </ul>
    @endauth
</div>

    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="/assets/js/chart.js"></script>
    
    <div class="main">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.navbar1 {
  overflow: hidden;
  background-color: white;
  font-family: Arial, Helvetica, sans-serif;
  --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.navbar1 a {
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown1 {
  float: right;
  overflow: hidden;
}

.dropdown1 .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar1 a:hover, .dropdown1:hover .dropbtn, .dropbtn:focus {
  background-color:rgb(239, 238, 238);
;
}

.dropdown1-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown1-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown1-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}
</style>

<body>

<div class="navbar1">
  <div class="dropdown1">
  <button class="dropbtn" onclick="myFunction()">{{ Auth::user()->name }}
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown1-content" id="myDropdown">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
    <a href="{{ route('mdp.index') }}">Password</a>
  </div>
  </div> 
</div>

<h3></h3>
<p>.</p>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>
        <!--<div class="graphBox1">
                
            <div class="box2">
                    <div class="dropdown">
                        <button class="mr-3 Relative absolute right-0 text-gray-500 hover:bg-gray-200 hover:text-gray-700 px-4 py-2 rounded-md text-bold font-medium text-lg">
                        {{ Auth::user()->name }}
                        </button>
                
                        <div class="dropdown-content">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class=" px-4 py-2 rounded-md text-sm font-medium">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                 @csrf
                                </form>
                        </div>
                    </div>
                </div>
            </div>-->
        <div class="mt-8">
            @yield('content')
        </div>
    </div>
</body>
</html>
