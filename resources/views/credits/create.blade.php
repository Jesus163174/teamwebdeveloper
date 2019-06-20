@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
    <div class="row top-md">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="card card card-small mb-4 bm-md">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Registrar nuevo credito</h6>
                </div>
                <div class="card-body">
                    <form action="{{asset('admin/creditos')}}" method="post">
                        @csrf
                        @include('credits.form',['button'=>"Agregar"])
                    </form>
                </div>
            </div> 
        </div>
    </div>  
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@stop