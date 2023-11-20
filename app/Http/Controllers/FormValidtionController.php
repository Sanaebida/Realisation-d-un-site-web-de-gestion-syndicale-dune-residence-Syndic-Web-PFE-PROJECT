<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class FormValidtionController extends Controller
{
// Create Form
  public function createUserForm(Request $request) {
  if(Auth::user()->hasRole('syndic')){
    return view('users.form');
  } }


  // Store Form data in database
  public function UserForm(Request $request) {
    if(Auth::user()->hasRole('syndic')){
      // Form validation
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email'
       ]);
      //  Store data in database
      Form::create($request->all());
      return back()->with('success', 'Copropriétaire ajouté avec succès');
    } 
  }

  function show(Request $request){
    if(Auth::user()->hasRole('syndic')){
      $data=Form::all();
      return view('users.users', ['data'=>$data]);
    } 
    else { 
      if (Form::where('email', '=', Auth::user()->email)->exists()) {
      $data=Form::all();
      return view('users.user2', ['data'=>$data]);
      } else {
        return view ('unallowed');
      }
    }
  }


  public function edit($id){
    if(Auth::user()->hasRole('syndic')){
  $data=Form::find($id);
  return view('users.edit',compact('data'));
  }
  }

  public function update(Request $request, $id)
  {
    if(Auth::user()->hasRole('syndic')){
    $this->validate($request, [
      'email' => 'required',
      'name' => 'required'
      ]);
      $data = Form::find($id);
      $data->email = $request->email;
      $data->name = $request->name;
      $data->save();
      return redirect()->route('users')
      ->with('success','user Has Been updated successfully');
    }
  }

  public function destroy($id){
    if(Auth::user()->hasRole('syndic')){
    $data=Form::find($id);
    $data->delete();
    return redirect()->route('users')->with('success','user Has Been deleted successfully');
   }
  }
}