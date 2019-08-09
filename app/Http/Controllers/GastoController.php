<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gastos;
use Auth;
use Carbon\Carbon;
class GastoController extends Controller{

    public function index(){
        $gastos = Gastos::where('user_id',Auth::user()->id);
        $total  = $gastos->sum('monto');
        $totalDia = $gastos->whereDate('created_at',Carbon::now())->sum('monto');
        $gastos = $gastos->get();

        return view('gastos.index',compact('gastos','total','totalDia'));
    }
    public function create(){
        return view('gastos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gastos = new Gastos();
        $gastos->monto = $request->monto;
        $gastos->descripcion = $request->descripcion;
        $gastos->user_id = Auth::user()->id;
        $gastos->save();

        return redirect('admin/gastos');
    }
    public function destroy($id)
    {
        $gasto = Gastos::find($id);
        $gasto->delete();
        return back();
    }
}
