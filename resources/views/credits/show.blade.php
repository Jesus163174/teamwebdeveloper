@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
    <div class="row" style="margin-top:20px;">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item"><strong>Total a pagar: ${{number_format($credit->total,2,'.',',')}}</strong></li>
                <li class="list-group-item"><strong>Cantidad Prestada: ${{number_format($credit->totalamount,2,'.',',')}}</strong></li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item"><strong>Total de pagos: </strong> {{$credit->totalpayments}}</li>
                <li class="list-group-item"><strong>Pagado: </strong> ${{$credit->pagado($credit->id)}}</li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="list-group" style="color:red; font-weight: bold;">
                <li class="list-group-item"><strong>Por pagar: </strong> ${{number_format($credit->faltante($credit->id,$credit->total),2,'.',',')}}</li>
                <li class="list-group-item"><strong>Pagos Diarios: </strong> ${{number_format($credit->dayPayments,2,'.',',')}}</li>
            </ul>
        </div>
    </div>
    <div class="row" style="margin-top:20px;">
        @for($i = 0; $i< $credit->totalpayments; $i++)
            <div class="col-md-3">
                <div class="card" style="margin: 10px 3px; padding:3px;">
                    <div class="card-header">
                        Pago {{$i+1}}
                    </div>
                    <div class="card-body">
                        @if($credit->dayNPay($i+1,$credit->id) == 1)
                            @if($credit->totalPayDay($credit->id,$i+1,$credit->dayPayments) == 1)
                                <a href="">Pagado</a>
                            @else
                                <a href="">Resta: {{$credit->totalPayDay($credit->id,$i+1,$credit->dayPayments)}}</a>
                                @if($i+1 == $credit->totalpayments and $credit->totalPayDay($credit->id,$i+1,$credit->dayPayments) != 1)
                                    <button class="btn btn-success form-control btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong-{{$i}}">Pagar</button>
                                    <form action="{{asset('admin/creditos/pagar')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$i+1}}" name="numberPay">
                                        <input type="hidden" value="{{$credit->id}}" name="credit_id">
                                        <input type="hidden" value="{{$credit->customer_id}}" name="customer_id">
                                        <div class="modal fade" id="exampleModalLong-{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Registrar pago</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Ingresa la cantidad a pagar</label>
                                                            <input type="number" required step="any" placeholder="Pago Numero: {{$i+1}}" name="payment" class="form-control form-control-lg" >
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Registrar pago</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        @else
                            <button class="btn btn-success form-control btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong-{{$i}}">Pagar</button>
                            <form action="{{asset('admin/creditos/pagar')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$i+1}}" name="numberPay">
                                <input type="hidden" value="{{$credit->id}}" name="credit_id">
                                <input type="hidden" value="{{$credit->customer_id}}" name="customer_id">
                                <div class="modal fade" id="exampleModalLong-{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Registrar pago</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Ingresa la cantidad a pagar</label>
                                                    <input type="number" required step="any" placeholder="Pago Numero: {{$i+1}}" name="payment" class="form-control form-control-lg" >
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Registrar pago</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endfor
    </div>

@stop