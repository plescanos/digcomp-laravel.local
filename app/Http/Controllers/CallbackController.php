<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\ReceiverController as Receiver;
use App\Http\Controllers\MensajeController;

class CallbackController extends Controller
{
    public static function check_callback() {

        if (parent::$callback === 'start_eval') {

            Receiver::call_first_datos_informativos(0);
            
        }else if(parent::$callback === 'abort') {
            
            MensajeController::abort_message();

        }else if(str_contains(parent::$callback, 'next')) {
            
            Receiver::call_next_datos_informativos();
            
        }else if(str_contains(parent::$callback, 'question_f')) {
            
            Receiver::call_next_question();
            
        }

    }
}
