<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    public function create(Request $request) {
      if(Auth::user()->hasRole('syndic'))
      { 
        $data=Reclamation::all()->sortByDesc('created_at');
        return view('reclamation.list', ['data'=>$data]);
      } else 
      { 
        if (Form::where('email', '=', Auth::user()->email)->exists()) 
          {
             return view('reclamation.reclamation');
          }
        else {
          return view ('unallowed');
        }
      }
    }  


      // Store Form data in database
    public function store(Request $request) {
          // Form validation
          $requestData = $request->all();
          $requestData["owner"] = auth()->user()->name;
          //  Store data in database
          //$input['owner'] = Auth::user()->name;
          Reclamation::create($requestData);
          return back()->with('success', 'Your form has been submitted.');

    }

  
}