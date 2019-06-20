@extends('layouts.admin')
@section('title','Admin')
@section('content')
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title">Analisis de la semana</h3>
    </div>
</div>
<div class="row">
    <!-- Users Stats -->
    <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
        <div class="card card-small">
            <div class="card-header border-bottom">
                <h6 class="m-0">Creditos(en construcción)</h6>
            </div>
            <div class="card-body pt-0">
                <div class="row border-bottom py-2 bg-light">
                    <div class="col-12 col-sm-6">
                        <div id="blog-overview-date-range"
                            class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0"
                            style="max-width: 350px;">
                            <input type="text" class="input-sm form-control" name="start" placeholder="Start Date"
                                id="blog-overview-date-range-1">
                            <input type="text" class="input-sm form-control" name="end" placeholder="End Date"
                                id="blog-overview-date-range-2">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="material-icons"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                        <button type="button"
                            class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">
                            Ver reporte &rarr;</button>
                    </div>
                </div>
                <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
            </div>
        </div>
    </div>
    <!-- End Users Stats -->
    <!-- Users By Device Stats -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card card-small h-100">
            <div class="card-header border-bottom">
                <h6 class="m-0">credito por cobrador(Contrucción)</h6>
            </div>
            <div class="card-body d-flex py-0">
                <canvas height="220" class="blog-users-by-device m-auto"></canvas>
            </div>
            <div class="card-footer border-top">
                <div class="row">
                    <div class="col text-right view-report">
                        <a href="#">Reporte &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
        <div class="card card-small blog-comments">
            <div class="card-header border-bottom">
                <h6 class="m-0">Clientes deudores (construcción)</h6>
            </div>
            <div class="card-body p-0">
                <div class="blog-comments__item d-flex p-3">
                    <div class="blog-comments__avatar mr-3">
                        <img src="images/avatars/1.jpg" alt="User avatar" />
                    </div>
                    <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                            <a class="text-secondary" href="#">Pedro Luis lopez Cruz</a>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted">
                            Cobrador: Carlos Enrique palacios Vicente
                        </p>
                        <div class="blog-comments__actions">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-white">
                                    <span class="text-success">
                                        <i class="material-icons">check</i>
                                    </span> Revisar </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-comments__item d-flex p-3">
                    <div class="blog-comments__avatar mr-3">
                        <img src="images/avatars/1.jpg" alt="User avatar" />
                    </div>
                    <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                            <a class="text-secondary" href="#">Pedro Luis lopez Cruz</a>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted">
                            Cobrador: Carlos Enrique palacios Vicente
                        </p>
                        <div class="blog-comments__actions">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-white">
                                    <span class="text-success">
                                        <i class="material-icons">check</i>
                                    </span> Revisar </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-comments__item d-flex p-3">
                    <div class="blog-comments__avatar mr-3">
                        <img src="images/avatars/1.jpg" alt="User avatar" />
                    </div>
                    <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                            <a class="text-secondary" href="#">Pedro Luis lopez Cruz</a>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted">
                            Cobrador: Carlos Enrique palacios Vicente
                        </p>
                        <div class="blog-comments__actions">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-white">
                                    <span class="text-success">
                                        <i class="material-icons">check</i>
                                    </span> Revisar </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
   
</div>
@stop