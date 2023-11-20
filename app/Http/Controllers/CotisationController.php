<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotisation;
use App\Models\Carnet;
use App\Models\Reclamation;
use Carbon\Carbon;
use App\Models\Form;
use DB;
use Illuminate\Support\Facades\Auth;


class CotisationController extends Controller
{
    // Create Form
  public function create(Request $request) {
    if(Auth::user()->hasRole('syndic')){
      return view('cotisation.create');
    } }
  
  
    // Store Form data in database
    public function store(Request $request) {
      if(Auth::user()->hasRole('syndic')){
        // Form validation
        $this->validate($request, [
            'nom' => 'required',
            'frais' => 'required',
            'date' => 'required'
                 ]);
        //  Store data in database
        Cotisation::create($request->all());
        return back()->with('success', 'Cotisation ajouté avec succès');
      } 
    }

    function show(Request $request){

            $data=Cotisation::all()->sortByDesc('created_at');
            $ii = Carnet::whereDate('created_at', Carbon::today())->get();
            $i = count($ii);

            $ss = Carnet::select('prix')
            ->whereMonth('date', Carbon::now()->month)
            ->get();
            $s = $ss;

            $cc = Carnet::where('status','=',"EnAttend")->get();
            $c = count($cc);

            if(Auth::user()->hasRole('syndic')){
            $rr = Reclamation::whereDate('created_at', Carbon::today())->get();
            $r = count($rr);
            return view('cotisation.index', compact('data','i','s','c','r'));
        } 
        else { 
          if (Form::where('email', '=', Auth::user()->email)->exists()) {
            $rr = Cotisation::whereDate('created_at', Carbon::today())->get();
            $r = count($rr);
          $data=Cotisation::all()->sortByDesc('created_at');
          return view('cotisation.index2', compact('data','i','s','c','r'));
          } else {
            return view ('unallowed');
          }
        }
      }

      public function edit($id){
        if(Auth::user()->hasRole('syndic')){
      $data=Cotisation::find($id);
      return view('cotisation.edit',compact('data'));
      }
      }

    public function update(Request $request, $id) {
    if(Auth::user()->hasRole('syndic')){
    $this->validate($request, [
        'nom' => 'required',
        'frais' => 'required',
        'date' => 'required'
      ]);
      $data = Cotisation::find($id);
      $data->nom = $request->nom;
      $data->frais = $request->frais;
      $data->date = $request->date;
      $data->save();
      return redirect()->route('cotisation.index')
      ->with('success','element Has Been updated successfully');
    }
  }
    public function destroy($id){
    if(Auth::user()->hasRole('syndic')){
    $data=Cotisation::find($id);
    $data->delete();
    return redirect()->route('cotisation.index')->with('success','elemet Has Been deleted successfully');
   }
  }
}
