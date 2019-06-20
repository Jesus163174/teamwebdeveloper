<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

    public function validate($request){
        return $request->validate([
            'name'=>'required',
            'rol'=>'required',
            'password'=>'required',
            'email'=>'required'
        ]);
    }
    public function store($validated){
        return User::create($validated);
    }
    public function edit($user,$request){
        return $user->fill($request)->save();
    }

    public function scopeEmployees($query,$status,$rol){
        return $query->byRol($rol)->orderBy('id','desc');
    }
    public function scopebyStatus($query,$status){
        return $query->where('status',$status);
    }
    public function scopeByRol($query,$rol){
        return $query->where('rol',$rol);
    }


}
