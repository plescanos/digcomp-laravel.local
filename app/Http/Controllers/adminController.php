<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Institucion;

class adminController extends Controller
{
    public static function build_admin_gui() {
        
        $instituciones =  Institucion::all();

        return view('pages.admin', ['instituciones' => $instituciones]);
        
    }

}
