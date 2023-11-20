<?php
  
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\Cotisation;
use App\Models\User;
use App\Models\Carnet;
use DB;
    
class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $carnets = Carnet::select(DB::raw("sum(prix) as count"), DB::raw("MONTHNAME(date) as month_name"))
                    ->whereYear('date', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy ('date')
                    ->pluck('count', 'month_name');
 
        $labels = $carnets->keys();
        $data = $carnets->values();

        $coti = Cotisation::select(DB::raw("sum(frais) as count"), DB::raw("MONTHNAME(date) as month_name"))
                    ->whereYear('date', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy ('date')
                    ->pluck('count', 'month_name');
              
        $labelss = $coti->keys();
        $datass = $coti->values();

        $ss = Carnet::where('prix','<=','200')->get();
        $s = count($ss);

        $ll = Carnet::where('prix','<','500')
                ->where('prix','>','200')
                ->get();
        $l = count($ll);

        $xx = Carnet::where('prix','>','500') ->get();
        $x = count($xx);

        return view('charts', compact('labels', 'data', 'labelss', 'datass','l','s','x'));
    }
}