@php
    //dd(json_decode($main_chart_dataset)->n1_c1)
@endphp
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row">
        {{-- QTY UNIVERSO - CAMBIAR ICONO EN CSS BEFORE --}}
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Universo</p>
                                <h5 class="font-weight-bolder">
                                        <div class="borra">{{ $universo }}</div>
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">100%</span>
                                        <br>trabajadores.
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TAMANO DE MUESTRA --}}
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Muestra</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $muestra }}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">{{ $porcentaje_muestra }}%</span>
                                        <br>del universo

                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DCI DIGCOMP --}}
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">DCI Global</p>
                                    <h5 class="font-weight-bolder">
                                        Nivel 3 (db)
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder">Avanzado</span>
                                        <br>Digital Skill Index*
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- AREA DE COMPETENCIA --}}
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Área de Competencia</p>
                                    <h5 class="font-weight-bolder">
                                        Información
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"> </span>
                                        Búsqueda, evaluación y gestión de datos.
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Resultados Generales Por Competencia</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">{{ $nombre_organizacion }}</span> {{ date('Y') }}
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ESTA SECCION ES EL SLIDER EXPLICATIVO QUE VOY A CAMIAR --}}
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active" style="background-image: url('./img/carousel-1.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Navegación, búsqueda y filtrado de información</h5>
                                    <p>Buscar información en la red y acceder a ella, articular las necesidades de información, 
                                        encontrar información relevante, seleccionar recursos de forma eficaz, 
                                        gestionar distintas fuentes de información, crear estrategias personales de información.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('./img/carousel-2.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Evaluación de la información</h5>
                                    <p>Recabar, procesar, comprender y evaluar la información de
                                        forma crítica.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('./img/carousel-3.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-trophy text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Almacenamiento y recuperación de la información</h5>
                                    <p>Gestionar y almacenar información y contenidos para su fácil recuperación, organizar información y datos.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Conteo general de respuestas por nivel y segmentadas según criterios ingresados.</h6>
                        </div>
                    </div>

                    {{-- ESTA TABLA SE RESUME A UN FOR CON LOS DATOS DE LA DB --}}
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                {{-- Mivel 1 -  Navegación, búsqueda y filtrado de la información--}}
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="./img/icons/filter.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Nivel 1:</p>
                                                <h6 class="text-sm mb-0">Básico</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="sexo">
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Hombres:</p>
                                            <h6 class="text-sm mb-0">{{ $genero['Masculino']['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="sexo">
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Mujeres:</p>
                                            <h6 class="text-sm mb-0">{{ $genero['Femenino']['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.20-30:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[1]['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.31-40:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[2]['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.41-50:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[3]['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.+50:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[4]['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bach:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[1]['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">3er. Nivel:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[2]['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">4to. Nivel:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[3]['nivel_1'] }}</h6>
                                        </div>
                                    </td>
                                </tr>
                               
                                {{-- Nivel 2 2 -  Evaluaci´øn de la información--}}
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="./img/icons/eval.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Nivel 2:</p>
                                                <h6 class="text-sm mb-0">Intermedio</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="sexo">
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Hombres:</p>
                                            <h6 class="text-sm mb-0">{{ $genero['Masculino']['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="sexo">
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Mujeres:</p>
                                            <h6 class="text-sm mb-0">{{ $genero['Femenino']['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.20-30:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[1]['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.31-40:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[2]['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.41-50:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[3]['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.+50:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[4]['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bach:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[1]['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">3er. Nivel:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[2]['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">4to. Nivel:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[3]['nivel_2'] }}</h6>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Nivel 3 3 - Almacenamiento y recuperación de la información--}}
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="./img/icons/save.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Nivel 3:</p>
                                                <h6 class="text-sm mb-0">Avanzado</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="sexo">
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Hombres:</p>
                                            <h6 class="text-sm mb-0">{{ $genero['Masculino']['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="sexo">
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Mujeres:</p>
                                            <h6 class="text-sm mb-0">{{ $genero['Femenino']['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.20-30:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[1]['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.31-40:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[2]['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.41-50:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[3]['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.+50:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[4]['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bach:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[1]['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">3er. Nivel:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[2]['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">4to. Nivel:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[3]['nivel_3'] }}</h6>
                                        </div>
                                    </td>
                                </tr>


                                {{-- Nivel 4 3 - Almacenamiento y recuperación de la información--}}
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="./img/icons/save.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Nivel 4:</p>
                                                <h6 class="text-sm mb-0">Muy avanzado</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="sexo">
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Hombres:</p>
                                            <h6 class="text-sm mb-0">{{ $genero['Masculino']['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="sexo">
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Mujeres:</p>
                                            <h6 class="text-sm mb-0">{{ $genero['Femenino']['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.20-30:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[1]['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.31-40:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[2]['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.41-50:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[3]['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm edad">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">E.+50:</p>
                                            <h6 class="text-sm mb-0">{{ $edad[4]['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bach:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[1]['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">3er. Nivel:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[2]['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm estudios">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">4to. Nivel:</p>
                                            <h6 class="text-sm mb-0">{{ $educacion[3]['nivel_4'] }}</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
{{--             <div class="col-lg-5">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-mobile-button text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                        <span class="text-xs">250 in stock, <span class="font-weight-bold">346+
                                                sold</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-tag text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                        <span class="text-xs">123 closed, <span class="font-weight-bold">15
                                                open</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-box-2 text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                        <span class="text-xs">1 is active, <span class="font-weight-bold">40
                                                closed</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-satisfied text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                        <span class="text-xs font-weight-bold">+ 430</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var main_chart_dataset = JSON.parse('<?php echo $main_chart_dataset; ?>')
        var muestra = '<?php echo $muestra; ?>'

        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(182, 208, 148, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(182, 208, 148, 0.2)');
        gradientStroke1.addColorStop(0, 'rgba(182, 208, 148, 0.2)');

        levelColor = ['#fb6340', '#fb6340', '#fb6340', '#fb6340',
            '#B6D094', '#B6D094', '#B6D094', '#B6D094',
            '#006E90', '#006E90', '#006E90', '#006E90'];



        new Chart(ctx1, {
            type: "bar",
            data: {
                labels: ["N1", "N2", "N3", "N4", "N1", "N2", "N3", "N4", "N1", "N2", "N3", "N4"],
                datasets: [{

                    label: "Competencia Digital (%)",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: levelColor,
                    //borderColor: "#fb6340",
                    backgroundColor: levelColor,
                    //backgroundColor: gradientStroke1,
                    borderWidth: 9,
                    fill: true,

                    data: [
                        main_chart_dataset.n1_c1.toFixed(2), 
                        main_chart_dataset.n2_c1.toFixed(2),
                        main_chart_dataset.n3_c1.toFixed(2),
                        main_chart_dataset.n4_c1.toFixed(2),
                        main_chart_dataset.n1_c2.toFixed(2), 
                        main_chart_dataset.n2_c2.toFixed(2),
                        main_chart_dataset.n3_c2.toFixed(2),
                        main_chart_dataset.n4_c2.toFixed(2),
                        main_chart_dataset.n1_c3.toFixed(2), 
                        main_chart_dataset.n2_c3.toFixed(2),
                        main_chart_dataset.n3_c3.toFixed(2),
                        main_chart_dataset.n4_c3.toFixed(2)],
                    maxBarThickness: 30

                }],
                
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                        position: 'bottom',

                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: parseInt(100),

                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            stepSize: 25,
                            display: true,
                            padding: 10,
                            color: '#000000',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: levelColor,
                            //color: '#ccc000',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
