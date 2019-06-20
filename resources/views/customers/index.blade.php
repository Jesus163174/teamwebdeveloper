@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
    <div class="row top-md">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <a href="/admin/clientes/create" class="btn btn-success bm-md">Agregar</a>
            @include('layouts.card',['title'=>'Listado de clientes','data'=>'customers.data','count'=>count($customers),'mobile'=>'customers.mobile'])
        </div>
    </div>
@stop