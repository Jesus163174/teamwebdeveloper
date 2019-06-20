<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model{

    protected $table = 'denuncias';
    protected $primaryKey = 'id';
    protected $fillable = ['title','description','image_url'];

    public function scopeDenuncias($query){
        return $query->orderBy('id','desc');
    }

    public function validate($request){
        return $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image_url'=>'required'
        ]);
    }

    public function store($dataValidated){
        return Denuncia::create($dataValidated);
    }
    public function edit($denuncia,$data){
        return $denuncia->fill($data)->save();
    }

}
