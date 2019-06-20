<div class="form-row">
    <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
        <label for="feFirstName">Nombre Completo</label>
        <input type="text" required name="fullname" class="form-control" id="feFirstName" placeholder="Nombre completo"
            value="{{$customer->fullname}}"> 
    </div>
    <div class="form-group col-md-6  col-lg-6 col-xs-12 col-sm-12">
        <label for="feFirstName">Telefono</label>
        <input type="number"   required name="phone" class="form-control" id="feFirstName" placeholder="Telefono"
            value="{{$customer->phone}}"> 
    </div>
    <div class="form-group col-md-12  col-lg-12 col-xs-12 col-sm-12">
        <label for="feFirstName">Email</label>
        <input type="email"   required name="email" class="form-control" id="feFirstName" placeholder="Email"
            value="{{$customer->email}}"> 
    </div>
    <div class="form-group col-md-6  col-lg-6 col-xs-12 col-sm-12">
        <label for="feFirstName">Dirección de casa</label>
        <textarea name="homeaddress" id="" class="form-control" cols="30" rows="10">{{$customer->homeaddress}}</textarea>
    </div>
    <div class="form-group col-md-6  col-lg-6 col-xs-12 col-sm-12">
        <label for="feFirstName">Dirección de negocio</label>
        <textarea name="businessadress" id="" class="form-control" cols="30" rows="10">{{$customer->businessadress}}</textarea>
    </div>

    <div class="form-group col-md-12  col-lg-12 col-xs-12 col-sm-12">
        <button type="submit" class="btn btn-success">Agregar</button>
    </div>
</div>