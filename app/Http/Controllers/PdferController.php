<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdferController extends Controller
{

    public static function make_pdf() {
        
        $data = array('datos');
        $pdf = Pdf::loadView('pages.pdfer', $data);
        return $pdf->download('invoice.pdf'); 
    }

}
