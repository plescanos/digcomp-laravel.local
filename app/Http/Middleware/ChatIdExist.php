<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Telegram\Bot\Laravel\Facades\Telegram;

use App\Models\Encuesta;
use App\Http\Controllers\MensajeController;

class ChatIdExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $chat_id_collection = Encuesta::get_all_chat_id();

        foreach ($chat_id_collection as $value) {
            $array_chat_id[] = $value->chat_id;
        }

        if (!in_array($request->input('message.chat.id'), $array_chat_id)) {
    
            $request->merge(['usuario_existe' => false]);
            /*             $datos_init_encuestado = [
                'chat_id' => $request->input('message.chat.id'),
                'chat_first_name' =>  $request->input('message.chat.first_name'),
                'chat_last_name' =>  $request->input('message.chat.last_name'),
                'chat_username' => ($request->input('message.chat.username') != '' ? $request->input('message.chat.username') : $request->input('message.chat.first_name'))
            ];
            */
            //Encuesta::set_init_case($datos_init_encuestado);
            
            //MensajeController::send_mensaje_bienvenida($request);
            
        }else {
            $request->merge(['usuario_existe' => true]);
            /*             $response = Telegram::sendMessage([
                'chat_id' => '5955438178',
                'text' => 'SI hay el registro',
            ]); */
            
        }
        
        //Storage::put('req_2.txt', $request );
        
        return $next($request);

    }
}
