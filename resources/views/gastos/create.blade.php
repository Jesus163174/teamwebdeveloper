@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
    <div class="row top-md">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="title">Agregar nuevos gastos</h3>
                </div>
                <div class="card-body">
                   <form action="{{asset('admin/gastos')}}" method="post">
                       @csrf
                       <div class="form-group">
                           <label for="">Monto del gasto: </label>
                           <input required type="number" step="any" class="form-control" name="monto">
                       </div>
                       <div class="form-group">
                           <label for="">Descripción: </label>
                           <textarea name="descripcion" id="" cols="30" rows="10" class="form-control" required></textarea>
                       </div>
                       <button type="submit" class="form-control btn-success">Agregar gasto </button>
                   </form>
                </div>
            </div>
        </div>
    </div>
@stop