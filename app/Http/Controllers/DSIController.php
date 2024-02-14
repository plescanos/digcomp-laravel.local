<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DSIController extends Controller
{
    public static function calcular_dsi($sum_puntaje, $qty_preguntas):float
    {
        $dsi = $sum_puntaje / $qty_preguntas;
        return round($dsi, 1);
    }
}
