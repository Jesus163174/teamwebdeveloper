<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class Credit extends Model{
    
    protected $table = 'credits';
    protected $primaryKey = 'id';

    protected $fillable = ['totalamount','wainnings','total','totalpayments','dayPayments','date','customer_id','lender_id','initialDate','finishDate'];
    
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function lender(){
        return $this->belongsTo('App\User','lender_id');
    }

    public function dayNPay($pay,$credit){
        $day = DB::table('payment_histories')->where([['numberPay',$pay],['credit_id',$credit]])->count();
        return $day;
    }

    public function faltante($credit,$total){
        $totalPagado =  DB::table('payment_histories')->where('credit_id',$credit)->sum('payment');
        $totalPagado = $total - $totalPagado;
        return $totalPagado;
    }
    public function pagado($credit){
        return DB::table('payment_histories')->where('credit_id',$credit)->sum('payment');

    }
    public function totalPayDay($credit,$index,$todayPay){
        $pagado = DB::table('payment_histories')->where([['numberPay',$index],['credit_id',$credit]])->first();
        if($pagado->payment == $todayPay)
            return true;
        return $todayPay - $pagado->payment;
    }
    public function total(){
        return $this->count();
    }

    public function totalMoneyLent(){
        return number_format($this->sum('totalamount'),2,'.',',');
    }

    public function totalWainnings(){
        return number_format($this->where('status','pagado')->sum('wainnings'),2,'.',',');
    }

    public function applyPercentage($total){
        return $total * .20;
    }

    public function validate($request){
        return $request->validate([
            'totalamount'=>'required',
            'totalpayments'=>'required',
            'customer_id'=>'required'
        ]);
    }

    public function store($validated){
        return Credit::create($validated);
    }

    public function edit($credit,$request){
        return $credit->fill($request)->save();
    }

    public function scopeCredits($query){
        if(Auth::user()->rol == 'admin')
            return $query->orderBy('created_at','desc');
        else
            return $query->yourCredits();
    }

    public function scopeYourCredits($query){
        return $query->where('lender_id',Auth::user()->id);
    }
    public function scopebyStatus($query,$status){
        return $query->where('status',$status);
    }

    public function scopeByCustomer($query,$customerId){
        return $query->where('customer_id',$customerId);
    }
}
