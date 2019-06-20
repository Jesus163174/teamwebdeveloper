<?php

namespace App\Http\Controllers;

use App\PaymentHistory;
use Illuminate\Http\Request;
use App\Credit;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller{

    public function index(){
        $credits = Credit::credits()->get();
        $results = new Credit();
        return view('credits.index',compact('credits','results'));
    }
    public function create(){
        $customers = Customer::customers()->get();
        $credit = new Credit();
        return view('credits.create',compact('customers','credit'));
    }
    public function store(Request $request){
        try{
            $credit    = new Credit();
            $validated = $credit->validate($request);
            $wainnings = $credit->applyPercentage($request->totalamount);
            $validated['wainnings'] = $wainnings;
            $validated['lender_id'] = Auth::user()->id;
            $validated['date'] = Carbon::now()->format('Y-m-d');
            $validated['initialDate'] = Carbon::now()->addDay(1);
            $validated['finishDate']  = Carbon::now()->addDays($validated['totalpayments']);
            $validated['total'] = $wainnings + $validated['totalamount'];
            $validated['dayPayments'] = $validated['total']/$validated['totalpayments'];
            $credit->store($validated);
            $msj = "El credito fue agregado correctamente";
            try{
                $clientChangeStatus = Customer::lend(Customer::find($validated['customer_id']));
            }catch(\Exception $e){
                dd($e->getMessage());
            }
            return redirect('admin/creditos')->with('status_success',$msj); 
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
    public function  pay(Request $request){

        //verificar cuanto me esta pagando
        $pagar  = $request->payment;
        //detalle del credito
        $credit = Credit::find($request->credit_id);
        //en que pago esta
        $numberPayment = $request->numberPay;

        //ferifico adeudos del credito con el estatus del registro
        $pagosRealizados = PaymentHistory::where([['credit_id',$credit->id],['estatus','incompleto']])->get();
        if(count($pagosRealizados) != 0) { //tiene adeudos
            foreach($pagosRealizados as $pagosRealizado){
                $resto = $credit->dayPayments - $pagosRealizado->payment;
                if($resto <= $pagar ){ //pagando o loquidando
                    $pagosRealizado->payment +=$resto;
                    $pagosRealizado->estatus = 'pagado';
                    $pagosRealizado->save();
                    $pagar -=$resto;
                }else{
                    $pagosRealizado->payment +=  $pagar;
                    if($pagosRealizado->paymet == $credit->dayPayments)
                        $pagosRealizado->estatus = 'pagado';
                    $pagosRealizado->save();
                    $pagar = 0;
                }

            }
            while($pagar != 0){
                if($pagar >= $credit->dayPayments){
                    $pay = new PaymentHistory();
                    $pay->customer_id = $request->customer_id;
                    $pay->lender_id   = Auth::user()->id;
                    $pay->credit_id  = $request->credit_id;
                    $pay->paymentDateCurrent = Carbon::now();
                    $pay->paymentDate  = Carbon::now();
                    $pay->numberPay = $numberPayment;
                    $pay->payment   = $credit->dayPayments;
                    $pay->estatus = 'pagado';
                    $pay->save();
                    $pagar -=$credit->dayPayments;
                    $numberPayment++;
                }else{
                    $pay = new PaymentHistory();
                    $pay->customer_id = $request->customer_id;
                    $pay->lender_id   = Auth::user()->id;
                    $pay->credit_id  = $request->credit_id;
                    $pay->paymentDateCurrent = Carbon::now();
                    $pay->paymentDate  = Carbon::now();
                    $pay->numberPay = $numberPayment;
                    $pay->payment   = $pagar;
                    $pay->estatus = 'incompleto';
                    $pay->save();
                    $pagar=0;
                }
            }
        }else{ //no tiene adeudos
            while($pagar != 0){
                if($pagar >= $credit->dayPayments){
                    $pay = new PaymentHistory();
                    $pay->customer_id = $request->customer_id;
                    $pay->lender_id   = Auth::user()->id;
                    $pay->credit_id  = $request->credit_id;
                    $pay->paymentDateCurrent = Carbon::now();
                    $pay->paymentDate  = Carbon::now();
                    $pay->numberPay = $numberPayment;
                    $pay->payment   = $credit->dayPayments;
                    $pay->estatus = 'pagado';
                    $pay->save();
                    $pagar -=$credit->dayPayments;
                    $numberPayment++;
                }else{
                    $pay = new PaymentHistory();
                    $pay->customer_id = $request->customer_id;
                    $pay->lender_id   = Auth::user()->id;
                    $pay->credit_id  = $request->credit_id;
                    $pay->paymentDateCurrent = Carbon::now();
                    $pay->paymentDate  = Carbon::now();
                    $pay->numberPay = $numberPayment;
                    $pay->payment   = $pagar;
                    $pay->estatus = 'incompleto';
                    $pay->save();
                    $pagar=0;
                }
            }
        }
        if($credit->faltante($credit->id,$credit->total) == 0){
            $credit->status = 'pagado';
            $credit->save();
        }

        return back();
    }
    public function show($id){
        $credit = Credit::find($id);
        return view('credits.show',compact('credit'));
    }
    public function edit($id){
        $credit = Credit::find($id);
        $customers = Customer::customers()->get();
        return view('credits.edit',compact('credit','customers'));
    }
    public function update(Request $request, $id){
        //
    }
    public function destroy($id){
        //
    }
}
