@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
    <div class="row top-md">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="title">Listado de gastos</h3>
                    <span>Total general: ${{number_format($total,2,'.',',')}}</span> <br>
                    <span>Total del día: ${{number_format($totalDia,2,'.',',')}}</span> <br>
                    <a class="btn btn-success btn-sm" href="/admin/gastos/create">Agregar Gasto</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gastos as $gasto)
                                    <tr>
                                        <td>${{number_format($gasto->monto,2,'.',',')}}</td>
                                        <td>{{$gasto->created_at}}</td>
                                        <td>{{$gasto->descripcion}}</td>
                                        <td>
                                            <form action="{{asset('admin/gastos/'.$gasto->id)}}" method="post">
                                                {{method_field('delete')}}
                                                @csrf
                                                <button type="submit"  class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop