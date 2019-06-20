<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Customer extends Model{
    
    protected $primaryKey = 'id';
    protected $table = 'customers';
    protected $fillable = ['fullname','email','phone','homeaddress','businessadress','recorder_id'];

    public function registro(){
        return $this->belongsTo('App\User','recorder_id');
    }
    public function credits(){
        return $this->belongsTo('App\Credit','customer_id');
    }
    public function scopeCustomers($query){
        if(Auth::user()->rol == 'admin')
            return $query->orderBy('id','desc');
        else
            return $query->yourCustomers();
    }
    public function scopeAuthorizate($query){
        return $query->where('status','prestar');
    }
    public function scopeYourCustomers($query){
        return $query->where('recorder_id',Auth::user()->id);
    }
    public function scopeWithDebt($query){
        return $query->where('status','deuda');
    }
    public function validate($request){
        return $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'homeaddress'=>'required',
            'businessadress'=>'required'
        ]);
    }
    public function store($validated){
        return Customer::create($validated);
    }
    public function edit($customer,$request){
        return $customer->fill($request)->save();
    }
    public static function lend($customer){
        $customer->status = 'deuda';
        return $customer->save();
    }
}
