@foreach($users as $employe)
<div class="col-lg-3 col-md-6 col-xs-12 col-sm-12 mb-4 responsive">
    <div class="card card-small card-post card-post--1">
        <div class="card-post__image" style="background-image: url('{{asset('images/content-management/2.jpeg')}}');">
            <a href="#" class="card-post__category badge badge-pill badge-success">{{$employe->status}}</a>
            <div class="card-post__author d-flex">
                <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                    style="background-image: url('{{asset('images/avatars/1.jpg')}}');">Written by James Jamerson</a>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <a class="text-fiord-blue" href="#">{{$employe->name}}</a>
            </h5>
            <p class="card-text d-inline-block mb-3">
                {{$employe->email}} |
            </p>
            <span class="text-muted">Creación: {{$employe->created_at}}</span>
        </div>
        <div class="card-footer">
            <a href="{{asset('admin/usuarios/'.$employe->id)}}" class="btn">Detalle</a>
        </div>
    </div>
</div>
@endforeach