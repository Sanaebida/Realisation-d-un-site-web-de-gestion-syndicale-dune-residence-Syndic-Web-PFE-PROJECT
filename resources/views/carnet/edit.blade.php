@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/lilstyles.css">
<body >
  <div class="max-w-4xl p-6 mx-auto bg-gray-100 rounded-md shadow-md dark:bg-gray-800 mt-1">
      @if(Session::has('success'))
          <div class="alert alert-success text-center">
              {{Session::get('success')}}
          </div>
      @endif  
      <h1 class="text-xl font-bold text-gray-800 capitalize dark:text-white py-1 ">Modifier la charge</h1>
      <br>  
      <form  action="{{ route('carnet.update',$carnets->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-2">
              <label class="text-gray-800">depense</label>
              <input type="text" class="form-control @error('tache') is-invalid @enderror" name="tache" id="tache" value="{{$carnets->tache}}">
              @error('tache')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group mb-2">
              <label class="text-gray-800" >Date</label>
              <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{$carnets->date}}">
              @error('date')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group mb-2">
            <label class="text-gray-800" >Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{$carnets->status}}">
              <option value="complet">complet</option>
              <option value="incomplet">incomplet</option>
              <option value="en cours">En Cours</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2">
          <label class="text-gray-800" >Prix</label>
          <input type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" id="prix" value="{{$carnets->prix}}">
          @error('prix')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <input class="form-control" name="photo" type="file" id="photo"  value="{{$carnets->photo}}">
        </div>
          <div class="d-grid mt-3">
              <input type="submit" name="send" value="Modifier" class="shadow bg-indigo-500 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
            </div>
      </div>
      
  </form>
</div>
</body>

<!--<div class="card">
    <div class="card-header">Modifier tache</div>
    <div class="card-body">
        
        <form action="{{ route('carnet.update',$carnets->id)}}" method="post" enctype="multipart/form-data" novalidate>
          @csrf
          @method('PUT')
          <label>Tache</label></br>
          <input type="text" name="tache" id="tache" class="form-control" value="{{$carnets->tache}}"></br>
          <label>Date</label></br>
          <input type="date" name="date" id="date" class="form-control" value="{{$carnets->date}}"></br>
          <label>Stutus</label></br>
          <input type="text" name="status" id="status" class="form-control" value="{{$carnets->status}}"></br>
          <label>Prix</label></br>
          <input type="number" name="prix" id="prix" class="form-control" value="{{$carnets->prix}}"></br>
          <input class="form-control" name="photo" type="file" id="photo" value="{{$carnets->photo}}">
   
          
          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
    
    </div>
  </div>-->
  @stop
  