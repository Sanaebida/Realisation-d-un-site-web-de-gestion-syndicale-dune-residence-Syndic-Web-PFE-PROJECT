@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="assets/css/style2.css">
<div class="container">
  <div class="content container-fluid bootstrap snippets bootdey">
        <div class="row row-broken">
            <div class="chat-body">
                <h6>Les Réclamations :</h6>
              <div class="answer left">
                <div class="avatar">
                  <div class="status offline"></div>
                </div>
                @foreach ($data as $i)
                <div class="name">{{$i->owner}}</div>
                <div class="text">{{$i->comment}}</div>
                <div class="time">{{$i->created_at}}</div>
                @endforeach
              </div>
              
          </div>
        </div>
      </div>
    </div>
 </div>
       
  @endsection
