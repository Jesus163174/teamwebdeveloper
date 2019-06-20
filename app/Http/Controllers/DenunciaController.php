<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denuncia;
class DenunciaController extends Controller{

    public function index(){
        $response = null;
        try{
            $denuncias = Denuncia::denuncias()->paginate(10);
            $msj = "Respuesta exitosa, code 200";
            $response = array(
                'data'=>$denuncias,
                'response'=>$msj,
                'status'=>200
            );
        }catch(Exception $e){
            $response = array(
                'data'=>'',
                'response'=>$e->getMessage(),
                'status'=>500
            );
        }
        return response()->json($response);
    }
    public function store(Request $request){
        //
    }
    public function show($id){
        //
    }
    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
