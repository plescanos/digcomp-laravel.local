@php
    //dd(json_decode($main_chart_dataset)->n1_c1)

@endphp

@extends('layouts.admin_layout', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('layouts.navbars.auth.topnav_admin', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Panel de Administración</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">{{ 'Agregar una institución' }}</span> 
                        </p>
                        <form action="/push-institucion" method="post">
                            @csrf
                            <label for="nombre-institucion">Nombre de la Institución</label>
                            <input id="nombre-institucion" type="text" name="nombre_institucion">
                            <label for="universo">Universo</label>
                            <input id="universo" type="text" name="universo">
                            <button type="submit">Agregar</button>
                        </form>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>
</div>
</div>
        
@endsection


