<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;
use Illuminate\Support\Facades\Storage;

use Telegram\Bot\Keyboard\InlineKeyboardMarkup;
use Telegram\Bot\Keyboard\InlineKeyboardButton;

use App\Http\Controllers\ResponsesController as Responder;
use App\Models\Encuesta;

class MensajeController extends Controller
{


    public static function send_mensaje_bienvenida() {

        $mensaje = build_mensaje_bienvenida(parent::$username);

        $keyboard = [
            [
                ['text' => 'Si', 'callback_data' => 'start_eval'],
                ['text' => 'No', 'callback_data' => 'abort'],
            ],
        ];

        $inlineKeyboard = [
            'inline_keyboard' => $keyboard,
            'one_time_keyboard' => true,
        ];

        $replyMarkup = Keyboard::make($inlineKeyboard);


        $response = Telegram::sendMessage([
            
            'chat_id' => session('chat_id'),
            'text' => $mensaje,
            'reply_markup' => $replyMarkup,

        ]);
    }

    public static function send_test_message( $request ) {
        
        $response = Telegram::sendMessage([
            

            'chat_id' => ($request->input('message.chat.id') != null) ? $request->input('message.chat.id') : $request->input('callback_query.message.chat.id'),
            'text' => 'mensaje de prueba',

        ]);

    }

    public static function send_dsi($dsi) {

        $mensaje = 'Su DSI global es ' . $dsi;

        Telegram::sendMessage([
            
            'chat_id' => session('chat_id'),
            'text' => $mensaje,
            

        ]);
    }


    public static function send_dsi_by_competencia($dsi, $competencia_name) {

        $mensaje = 'Su DSI de la competencia: **' .  $competencia_name . '** es: ' . $dsi;

        Telegram::sendMessage([
            
            'chat_id' => session('chat_id'),
            'text' => $mensaje,
            

        ]);
    }
    
    public static function send_mensaje_usuario_existente() {
        $response = Telegram::sendMessage([
            
            'chat_id' => session('chat_id'),
            'text' => 'Usted ya ha realizado esta autoevaluación. Gracias por su interés.',

        ]);
    }


    public static function build_pregunta_respuestas() {
        $data_preguntas_respuestas = Encuesta::get_respuestas_por_pregunta(parent::$current_id);

        foreach ($data_preguntas_respuestas as $key => $value) {
            $keyboard[] = array(['text' => $value->respuesta, 'callback_data' => $value->id]);
        }
        //Storage::put('comiinnngggg_13.txt', json_encode($keyboard) );

        $inlineKeyboard = ([
            'inline_keyboard' => $keyboard,
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
        ]);

        
        $replyMarkup = Keyboard::make($inlineKeyboard);
        
        
        $response = Telegram::sendMessage([
            
            'chat_id' => session('chat_id'), 
            'text' => parent::$enunciado,
            'reply_markup' => $replyMarkup,
            
        ]);
        
        return;

    }

    public static function abort_message() {
        $response = Telegram::sendMessage([
            
            'chat_id' => session('chat_id'), 
            'text' => "Gracias por tu interés.",
            
        ]);

        Responder::deleteChat(session('chat_id'));
    }

    public static function cargar_datos_informativos($texto, $tbl_slug, $contador = 0) {
        $instituciones = Encuesta::get_instituciones($tbl_slug);


        foreach ($instituciones as $key => $value) {
            $keyboard[] = array(['text' => $value->nombre_telegram, 'callback_data' => 'next,' . $contador . ',' . $value->id]);
        }
        //$keyboard[] = array(['text' => 'Abortar', 'callback_data' => 'abort']);


        $inlineKeyboard = ([
            'inline_keyboard' => $keyboard,
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
        ]);

        
        $replyMarkup = Keyboard::make($inlineKeyboard);
        
        
        $response = Telegram::sendMessage([
            
            'chat_id' => session('chat_id'), 
            'text' => $texto,
            'reply_markup' => $replyMarkup,
            
        ]);
        
        return;
    }

    public static function cargar_pregunta_respuestas($texto, $contador_pregunta) {
        $respuestas = Encuesta::get_respuestas_por_pregunta($contador_pregunta);



        foreach ($respuestas as $key => $value) {
            $keyboard[] = array(['text' => $value->respuesta, 'callback_data' => 'question_f,' . $contador_pregunta . ',' . $value->id]);
        }
        //$keyboard[] = array(['text' => 'ABORTAR CUESTIONARIO', 'callback_data' => 'abort']);
        
        
        $inlineKeyboard = ([
            'inline_keyboard' => $keyboard,
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
        ]);
        
        
        $replyMarkup = Keyboard::make($inlineKeyboard);
        
        
        $response = Telegram::sendMessage([
            
            'chat_id' => session('chat_id'), 
            'text' => $texto,
            'reply_markup' => $replyMarkup,
            
        ]);
        
        //Storage::put('question_1', $value->question_number);
        return;
    }

    public static function borrar_teclado() {
                    
            
            //Storage::put('comiinnngggg_16.txt', 'jhgsdf' );
            $emptyKeyboard = [
                'inline_keyboard' => [],
            ];
            
            $emptyKeyboard = json_encode($emptyKeyboard);
            $ch = curl_init("https://api.telegram.org/bot6519055141:AAFAGMm7ci2C79HHUKEpK3RbbcLVQpUIyQ0/editMessageReplyMarkup");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'chat_id' => session('chat_id'),
                'message_id' => parent::$message_id,
                'reply_markup' => $emptyKeyboard,
            ]);
            curl_exec($ch);
            curl_close($ch);
    }
}
