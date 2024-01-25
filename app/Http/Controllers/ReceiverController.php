<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Models\Encuesta;
use App\Models\SqliteModel as Sqlite;
use App\Http\Controllers\ResponsesController as Responses;
use App\Http\Controllers\MensajeController;
use Illuminate\Support\Facades\Auth;


class ReceiverController extends Controller
{
    private static $temp_table;

    public static function set_message_data($request) {
        session()->put('chat_id', $request->input('message.from.id'));
        parent::$chat_id = $request->input('message.from.id');
        parent::$update_id = $request->input('update_id');
        parent::$message_id = $request->input('message.message_id');
        parent::$first_name = ($request->input('message.from.first_name') != null) ? $request->input('message.from.first_name') : 'Invitado';
        parent::$last_name = ($request->input('message.from.last_name') != null) ? $request->input('message.from.last_name') : 'Guest';
        parent::$username = ($request->input('message.from.username') != null) ? $request->input('message.from.username') : $request->input('message.from.first_name');
        parent::$texto = ($request->input('message.text') != null) ? $request->input('message.text') : 'Sin mensaje';

    }
    
    public static function set_callback_query_data($request) {
        
        session()->put('chat_id', $request->input('callback_query.from.id'));
        parent::$chat_id = $request->input('callback_query.from.id');
        parent::$update_id = $request->input('update_id');
        parent::$first_name = ($request->input('callback_query.from.first_name') != null) ? $request->input('callback_query.message.from.first_name') : 'Invitado';
        parent::$last_name = ($request->input('callback_query.from.last_name') != null) ? $request->input('callback_query.message.from.last_name') : 'Guest';
        parent::$username = ($request->input('callback_query.from.username') != null) ? $request->input('callback_query.message.from.username') : $request->input('callback_query.message.from.first_name');
        parent::$callback = $request->input('callback_query.data') ;
        parent::$message_id = $request->input('callback_query.message.message_id') ;

    }

    public static function check_user_exist() {

        $chat_id_collection = Encuesta::get_all_chat_id();
         //Aqui se utiliza el helpr 
        $chat_id_exists = check_chat_id_exists(session('chat_id'), $chat_id_collection);
        $chat_id_exists == 0 ? Responses::start() : Responses::usuario_existente();
    
    }
    public static function call_first_datos_informativos($id_campo_dato) {

        $datos_informativos = Encuesta::get_campo_datos_informativos($id_campo_dato);
        session()->put('contador', $datos_informativos->id);
        $texto = 'Por favor, seleccione su ' . $datos_informativos->nombre_campo ;
        
        MensajeController::cargar_datos_informativos(
            $texto, 
            $datos_informativos->id, 
            $datos_informativos->campo_slug);

        MensajeController::borrar_teclado();
        
    }
    
    public static function call_next_datos_informativos() {
        
        $callback_array = explode(',', parent::$callback );
        /** fragmento para armar la estructura de datos */
        $campos_datos = Encuesta::get_usuario_field($callback_array[1]);
        $usuario_field = $campos_datos->usuario_field;
        
/* 
        self::$temp_table = 'table_' . session('chat_id');
        Sqlite::set_usuario_info($usuario_field, $callback_array[2], self::$temp_table);
        $dat = Sqlite::get_chat_id(self::$temp_table);
        Storage::put('qyestion_2', json_encode($dat) ); */
        


        
        $datos_informativos = Encuesta::get_campo_datos_informativos($callback_array[1]);
        if (isset($datos_informativos->id)) {
            session()->put('contador', $datos_informativos->id);
            $texto = 'Por favor, seleccione su ' . $datos_informativos->nombre_campo ;
            MensajeController::cargar_datos_informativos($texto, $datos_informativos->id, $datos_informativos->campo_slug);

        }else {

            self::call_first_question(0);

        }

        MensajeController::borrar_teclado();

    }

    public static function call_first_question($id_pregunta) {

        $pregunta = Encuesta::get_question($id_pregunta);
        $cantidad_preguntas = Encuesta::get_preguntas_count();
        session()->put('contador', $pregunta->id);
        
        $texto = 'Pregunta ' . $pregunta->question_number . '/' . $cantidad_preguntas . ': '
         . $pregunta->enunciado;

        MensajeController::cargar_pregunta_respuestas($texto, session('contador'));
        MensajeController::borrar_teclado();

        return;


    }

    public static function call_next_question() {
        $callback_array = explode(',', parent::$callback );
        
        $pregunta = Encuesta::get_question($callback_array[1]);
        $cantidad_preguntas = Encuesta::get_preguntas_count();


        if (isset($pregunta->id)) {

            session()->put('contador', $pregunta->id);
            $texto = 'Pregunta ' . $pregunta->question_number . '/' . $cantidad_preguntas . ': 
            ' . $pregunta->enunciado;
            MensajeController::cargar_pregunta_respuestas($texto, session('contador'));

        }else {
            Responses::set_new_chat_id();
            MensajeController::abort_message();

        }
        MensajeController::borrar_teclado();

    }
}
