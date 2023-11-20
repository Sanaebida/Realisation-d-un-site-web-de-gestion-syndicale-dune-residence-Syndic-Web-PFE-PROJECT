<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MdpController extends Controller
{
    public function index()
    {
        if (Auth::user()){
            return view ('mdp.motdepass');
        }
    }
     
    public function update(Request $request)
    {
    $this->validate($request, [
        'old_password'     => 'required',
        'new_password'     => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    ]);
 
    $data = $request->all();
  
    $user = User::find(auth()->user()->id);
 
    if(!\Hash::check($data['old_password'], $user->password)){
 
         return back()->with('error','You have entered wrong password');
 
    }else{
 
        $user->password =Hash::make($request->new_password);
        $user->save();
        return redirect()->route('mdp.index')
        ->with('success','le mot de passe a été modifié avec succès');
 
    }
}

}
