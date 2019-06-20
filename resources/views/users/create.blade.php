@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
<div class="row top-md">
    <div class="col-lg-12">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Registrar Usuario</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">
                            <form action="{{asset('admin/usuarios')}}" method="post">
                                @csrf
                                @include('users.form')
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@stop