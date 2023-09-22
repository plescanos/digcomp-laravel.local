<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesterController extends Controller
{
    public static function tester($a) {
        
        print_r($a);
    }
}
