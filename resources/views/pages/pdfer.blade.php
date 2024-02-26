
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
                                <tr class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Nivel 1:</p>
                                            <h6 class="text-sm mb-0">Básico</h6>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                
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

    </div>
