<?php

namespace App\Http\Controllers;

use App\Credit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller{

    public function index(){
        $dayCredits = Credit::where('date',Carbon::now()->format('Y-m-d'));
        $sumDineroPrestado = $dayCredits->sum('totalamount');
        $ganancias = $dayCredits->sum('total');
        $dayCredits = $dayCredits->get();
        return view('reports.index',compact('dayCredits','sumDineroPrestado','ganancias'));
    }
    public function credits(){

    }
}
