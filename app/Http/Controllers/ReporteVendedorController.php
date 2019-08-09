<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\User;
use App\Credit;
use App\PaymentHistory;
use Auth;
use Carbon\Carbon;
class ReporteVendedorController extends Controller{
    
    public function reporteCredito(){
        $vendedor = User::find(Auth::user()->id);
        $creditos = Credit::where('lender_id',Auth::user()->id)->whereDate('created_at',now());
        $pagos = PaymentHistory::where('lender_id',Auth::user()->id)->whereDate('created_at',Carbon::now());
        $dineroPagado = $pagos->sum('payment');
        $sumaDineroPrestado = $creditos->sum('totalamount');
        $creditos = $creditos->get();
        $pagos = $pagos->get();
        $pdf = PDF::loadView('reports.vendedores-pdf',compact('vendedor','creditos','sumaDineroPrestado','dineroPagado','pagos'));
        return $pdf->download('creditos.pdf');
    }

}
