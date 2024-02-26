<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


use App\Http\Controllers\Informes as InformesController;


class PdferController extends Controller
{

    public static function make_pdf() {
        $org_data = InformesController::build_org_data(1);
        

        $pdf = Pdf::loadView('pages.pdfer', [
            'universo' => $org_data['universo'],
            'nombre_organizacion' => $org_data['nombre_organizacion'],
            'muestra' => $org_data['muestra'],
            'porcentaje_muestra' => round(($org_data['muestra'] * 100) / $org_data['universo'], 2),
            'main_chart_dataset' => json_encode( $org_data['main_chart_dataset'] ),
            'genero' => $org_data['genero'],
            'edad' => $org_data['edad'],
            'educacion' => $org_data['educacion']
        ]);
        return $pdf->download('invoice.pdf'); 
    }

}
