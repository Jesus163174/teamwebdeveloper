<div class="form-row">
    <div class="form-group col-md-6">
        <label for="feFirstName">Nombre</label>
        <input type="text" required name="name" class="form-control" id="feFirstName" placeholder="Nombre completo"
            value="{{$user->name}}"> </div>
    <div class="form-group col-md-6">
        <label for="feLastName">Email</label>
        <input type="email" required name="email" class="form-control" id="feLastName" placeholder="Last Name"
            value="{{$user->email}}">
    </div>

    <div class="form-group col-md-6">
        <label for="feLastName">Contraseña</label>
        <input type="password" required name="password" class="form-control" id="feLastName" placeholder="Contraseña"
            value="{{$user->email}}">
    </div>

    <div class="form-group col-md-6">
        <label for="feLastName">Rol</label>
        <select name="rol" id="" class="form-control">
            <option value="{{$user->rol}}" selecte>Selecciona un rol</option>
            <option value="admin">1.Administrador</option>
            <option value="cobrador">2.Cobrador</option>
        </select>
    </div>
    <div class="form-group col-md-12">
        <button class="mb-2 btn btn-sm btn-pill btn-outline-success mr-2">Agregar</button>
    </div>
</div>