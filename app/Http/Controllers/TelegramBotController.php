<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ReceiverController as Receiver;
use App\Http\Controllers\MensajeController;
use App\Models\Encuesta;
use App\Http\Controllers\ResponsesController as Responses;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\CallbackController;

use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Telegram\Bot\Objects\Update;

use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;



class TelegramBotController extends Controller
{

    
    private $datos_update;
    private static $preguntas_array;
    protected static $contador;

    
    public function webhook(Request $request)
    {
        //Storage::put('question_1', json_encode(session()->get()));
        /** Bloque para extraer los datos del update */
        if (isset($request->message)) {
            
            $this->datos_update = Receiver::set_message_data($request);
            
            if ($request->input('message.text') == '/start') {
                Receiver::check_user_exist();
            }

        }else if(isset($request->callback_query)){
            
            $this->datos_update = Receiver::set_callback_query_data($request); 
            
            CallbackController::check_callback();

        }
    }
}
