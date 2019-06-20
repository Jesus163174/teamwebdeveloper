<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;
class CustomerController extends Controller{
   
    public function index(){
        $customers = Customer::customers()->get();
        return view('customers.index',compact('customers'));
    }
    public function create(){
        $customer = new Customer();
        return view('customers.create',compact('customer'));
    }
    public function store(Request $request){
        try{
            $customer = new Customer();
            $validate = $customer->validate($request);
            $validate['recorder_id'] = Auth::user()->id;
            $customer->store($validate);
            $msj = "El cliente a sido registrado correctamente";
            return redirect('admin/clientes')->with('status_success',$msj);
        }catch(Exception $e){
            return back()->with('status_danger',"Cliente no agregado, Error en el servidor: ".$e->getMessage());
        }
    }
    public function show($id){
        $customer = Customer::findOrfail($id);
        return view('customers.show',compact('customers'));
    }
    public function edit($id){
        $customer = Customer::find($id);
        return view('customers.edit',compact('customers'));
    }
    public function update(Request $request, $id){
        try{
            $customer = Customer::findOrfail($id);
            $customer->edit($customer,$request->all());
            $msj = "El cliente a sido actualizado correctamente";
            return redirect(Auth::user()->rol.'/clientes/'.$id)->with('status_success',$msj);
        }catch(Exception $e){
            
        }
    }
    public function destroy($id){
        //
    }
}
