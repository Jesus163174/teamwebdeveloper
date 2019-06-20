@extends('layouts.admin')
@section('title','Detalle de usuario')
@section('content')
<div class="row top-md">
    <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3">
            <div class="card-header border-bottom text-center">
                <div class="mb-3 mx-auto">
                    <img class="rounded-circle" src="{{asset('images/avatars/1.jpg')}}" alt="User Avatar" width="110"> </div>
                <h4 class="mb-0">{{$user->name}}</h4>
                <span class="text-muted d-block mb-2">{{$user->status}}</span>
                <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-success mr-2">
                    <i class="material-icons mr-1">money</i>Historial</button>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item px-4">
                    <div class="progress-wrapper">
                        <form action="{{asset('admin/usuarios/'.$user->id)}}" method="post">
                            @csrf
                            @method('delete')
                            @if($user->status == 'activo')
                                <button type="submit" class="mb-2 btn btn-sm btn-pill btn-outline-danger mr-2">Dar de baja</button>
                            @else
                                <button class="mb-2 btn btn-sm btn-pill btn-outline-success mr-2">Dar de alta</button>
                            @endif
                        </form>
                    </div>
                </li>
               
            </ul>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Detalle de la cuenta</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">
                            <form action="{{asset('admin/usuarios/'.$user->id)}}" method="post">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="feFirstName">Nombre</label>
                                        <input type="text" required name="name" class="form-control" id="feFirstName"
                                            placeholder="First Name" value="{{$user->name}}"> </div>
                                    <div class="form-group col-md-6">
                                        <label for="feLastName">Email</label>
                                        <input type="email" required name="email" class="form-control" id="feLastName" placeholder="Last Name"
                                            value="{{$user->email}}"> 
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="feLastName">Rol</label>
                                        <select name="rol" id="" class="form-control">
                                            <option value="{{$user->rol}}" selecte>{{$user->rol}}</option>
                                            <option value="admin">1.Administrador</option>
                                            <option value="cobrador">2.Cobrador</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="mb-2 btn btn-sm btn-pill btn-outline-success mr-2">Actualizar</button>
                                    </div>
                                    
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@stop