<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstitucionController extends Controller
{
    public static function set_new_institucion(Request $request) {

        DB::table('institucion')
        ->insert(['nombre_institucion' => $request->nombre_institucion, 'universo' => $request->universo, 'nombre_telegram' => $request->nombre_institucion]);
        
        return redirect('admin');
    }

}
