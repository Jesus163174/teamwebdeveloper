@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
<div class="row top-md">
    @if(Auth::user()->rol == 'admin')
        <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Dinero prestado</span>
                            <h6 class="stats-small__value count my-3">${{$results->totalMoneyLent()}}</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--increase">20%</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Ganancias</span>
                            <h6 class="stats-small__value count my-3">${{$results->totalWainnings()}}</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--increase">20%</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                </div>
            </div>
        </div>
    @endif
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="card card card-small mb-4 bm-md enable">
            <div class="card-header border-bottom d-flex justify-content-between">
                <h6 class="m-0">Creditos registrados ({{count($credits)}})</h6>
                <a href="{{asset('/admin/creditos/create')}}" class="btn btn-success btn-sm">Agregar</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">prestado</th>
                                <th class="text-center">Ganancias</th>
                                <th class="text-center">pagos</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Inicial</th>
                                <th class="text-center">Final</th>
                                <th class="text-center">Cobrador</th>
                                <th class="text-center">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($credits as $credit)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{asset('admin/creditos/'.$credit->id)}}">
                                            {{$credit->customer->fullname}}
                                        </a>
                                    </td>
                                    <td class="text-center">${{number_format($credit->totalamount,2,'.',',')}}</td>
                                    <td class="text-center">${{number_format($credit->wainnings,2,'.',',')}}</td>
                                    <td class="text-center">{{$credit->totalpayments}}</td>
                                    <td class="text-center">{{$credit->date}}</td>
                                    <td class="text-center">{{$credit->initialDate}}</td>
                                    <td class="text-center">{{$credit->finishDate}}</td>
                                    <td class="text-center">{{$credit->lender->name}}</td>
                                    <td class="text-center">{{$credit->status}}</td>
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