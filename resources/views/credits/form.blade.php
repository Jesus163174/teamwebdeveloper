<div class="form-row">
    <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
        <label for="">Cantidad de dinero </label>
        <input type="number" name="totalamount" required min="1" step="any" class="form-control form-control-lg" placeholder="Ingresa la cantidad total a prestar: ">
    </div>
    <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
        <label for="">Total de pagos</label>
        <select name="totalpayments" class="form-control  form-control-lg" id="">
            <option value="5">5 Pagos</option>
            <option value="10">10 Pagos</option>
            <option value="15">15 Pagos</option>
            <option value="20">20 Pagos</option>
        </select>
    </div>
    <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
        <label for="">Selecciona un cliente - <a href="{{asset('/admin/clientes/create')}}">Agregar nuevo cliente</a></label>
        <select name="customer_id" required  class="form-control js-example-basic-single form-control-lg" id="">
            @if($credit->id == null)
                <option value="">Selecciona un cliente</option>
            @else
                <option value="">{{$credit->id}}</option>
            @endif
            @foreach($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->fullname}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-12  col-lg-12 col-xs-12 col-sm-12">
        <button type="submit" class="btn btn-success">Agregar</button>
    </div>
</div>