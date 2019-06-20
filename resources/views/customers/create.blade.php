@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
    <div class="row top-md">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
           <div class="card card-small mb-4">
               <div class="card-header  border-bottom">
                <h6 class="m-0">Registrar Cliente</h6>
               </div>
               <div class="card-body">
                    <form action="{{asset('admin/clientes')}}" method="post">
                        @csrf
                        @include('customers.form')
                    </form>
               </div>
           </div>
        </div>
    </div>
@stop