<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Carnet; 
use App\Models\Reclamation;
use App\Models\Cotisation;
use Illuminate\Support\Facades\Storage;
use App\Models\Form;
use DB;
use Carbon\Carbon;


class CarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carnets = Carnet::all()->sortByDesc('created_at');

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
            return view('carnet.index', compact('carnets','i','s','c','r'));
            } else { 
            if (Form::where('email', '=', Auth::user()->email)->exists()) {
                $rr = Cotisation::whereDate('created_at', Carbon::today())->get();
                $r = count($rr);
                return view('carnet.indexx', compact('carnets','i','s','c','r'));
            }
            else {return view ('unallowed');
                  }
                }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if(Auth::user()->hasRole('syndic')){
        return view('carnet.create');}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if(Auth::user()->hasRole('syndic')){
        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public'); 
        $requestData["photo"] = '/storage/'.$path;
        Carnet::create($requestData);
        return redirect('carnet')->with('flash_message', 'Tache Ajouter!'); 
    } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   if(Auth::user()->hasRole('syndic')){
        $carnets=Carnet::find($id);
        return view('carnet.edit',compact('carnets'));
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        if(Auth::user()->hasRole('syndic')){

        $this->validate($request, [
            'tache' => 'required',
            'date' => 'required',
            'status' => 'required',
            'prix' => 'required',
        ]);

        $carnets = Carnet::find($id);
        $carnets->tache = $request->tache;
        $carnets->date = $request->date;
        $carnets->status = $request->status;
        $carnets->prix = $request->prix;
        if ($request->hasFile('photo')){
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public'); 
            $requestData["photo"] = '/storage/'.$path;
            $carnets->photo = $requestData["photo"];
            $carnets->save();
        }
        return redirect()->route('carnet.index')
        ->with('success','Tache Has Been updated successfully');
    } }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    if(Auth::user()->hasRole('syndic')){
    $carnets=Carnet::find($id);
    if($carnets->photo!=null){
    Storage::delete('public/images/'.$carnets->fileName);
    }
    $carnets->delete();
    return redirect()->route('carnet.index')->with('success','tache Has Been deleted successfully');
    }
}
}
