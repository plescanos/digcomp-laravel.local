<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Informes as InformesController;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        

        $org_data = InformesController::build_org_data(1);
        
    
        return view('pages.dashboard', [
            'universo' => $org_data['universo'],
            'nombre_organizacion' => $org_data['nombre_organizacion'],
            'muestra' => $org_data['muestra'],
            'porcentaje_muestra' => round(($org_data['muestra'] * 100) / $org_data['universo'], 2),
            'main_chart_dataset' => json_encode( $org_data['main_chart_dataset'] ),
            'genero' => $org_data['genero'],
            'edad' => $org_data['edad'],
            'educacion' => $org_data['educacion']
        ]);
    }
}
