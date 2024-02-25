<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;

use App\Models\Encuesta;
//use App\Models\SqliteModel as Sqlite;
use App\Http\Controllers\ResponsesController as Responses;
use App\Http\Controllers\MensajeController;
use Illuminate\Support\Facades\Auth;



class ReceiverController extends Controller
{
    private static $temp_table;
    protected static $key_1;



    public static function set_message_data($request) {
        session()->put('chat_id', strval($request->input('message.from.id')));
        parent::$chat_id = strval($request->input('message.from.id'));
        parent::$update_id = $request->input('update_id');
        parent::$message_id = $request->input('message.message_id');
        parent::$first_name = ($request->input('message.from.first_name') != null) ? $request->input('message.from.first_name') : 'Invitado';
        parent::$last_name = ($request->input('message.from.last_name') != null) ? $request->input('message.from.last_name') : 'Guest';
        parent::$username = ($request->input('message.from.username') != null) ? $request->input('message.from.username') : $request->input('message.from.first_name');
        parent::$texto = ($request->input('message.text') != null) ? $request->input('message.text') : 'Sin mensaje';

        
    }
    
    public static function set_callback_query_data($request) {
        //Storage::put('question_3', json_encode($request->input()));

        session()->put('chat_id', strval($request->input('callback_query.from.id')));
        parent::$chat_id = strval($request->input('callback_query.from.id'));
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

        
        MensajeController::borrar_teclado();
        
        $datos_informativos = Encuesta::get_campo_datos_informativos($id_campo_dato);
        
        self::set_cache_clave($datos_informativos->usuario_field);
        
        //Storage::put('question_1', self::$key_1);//Test line
        
        session()->put('contador', $datos_informativos->id);
        $texto = 'Por favor, seleccione su ' . $datos_informativos->nombre_campo ;
        
        MensajeController::cargar_datos_informativos(
            $texto, 
            $datos_informativos->campo_slug,
            $datos_informativos->id);

        
    }
    public static function call_next_datos_informativos() {
        
        MensajeController::borrar_teclado();//Para borrar el teclado del chat
        
        /** fragmento para armar la estructura de datos */
        $callback_array = explode(',', parent::$callback );
        $campos_datos = Encuesta::get_usuario_field($callback_array[1]);
        $usuario_field = $campos_datos->usuario_field;
        
        $datos_informativos = Encuesta::get_campo_datos_informativos($callback_array[1]);
        $info_data_cache = self::set_cache_valor(explode(',', parent::$callback)[2]);

        if (isset($datos_informativos->id)) {
            session()->put('contador', $datos_informativos->id);
            $texto = 'Por favor, seleccione su ' . $datos_informativos->nombre_campo ;
            MensajeController::cargar_datos_informativos($texto, $datos_informativos->campo_slug, $datos_informativos->id);

            self::set_cache_clave($datos_informativos->usuario_field);

            $datos_demograficos['chat_id'] = session('chat_id');
            $datos_demograficos['campo'] = $info_data_cache[0];
            $datos_demograficos['valor'] = intval($info_data_cache[1]);
            //Storage::put('question_1', gettype($datos_demograficos['valor']));//Test line

            Encuesta::set_datos_demograficos($datos_demograficos['chat_id'], $datos_demograficos['campo'], $datos_demograficos['valor']);
            
        }else {
            $datos_demograficos['chat_id'] = session('chat_id');
            $datos_demograficos['campo'] = $info_data_cache[0];
            $datos_demograficos['valor'] = $info_data_cache[1];
            //Storage::append('question_1', $datos_demograficos['campo']);//Test line
            
            Encuesta::set_datos_demograficos($datos_demograficos['chat_id'], $datos_demograficos['campo'], $datos_demograficos['valor']);

            self::call_first_question(0);
            
        }
        
        
    }
    
    public static function call_first_question($id_pregunta) {
        
        
        self::set_cache_clave($id_pregunta);
        //Storage::append('question_1', Cache::get('clave'));//Test line
        
        MensajeController::borrar_teclado();

        $pregunta = Encuesta::get_question($id_pregunta);
        $cantidad_preguntas = Encuesta::get_preguntas_count();
        session()->put('contador', $pregunta->id);
        
        $texto = 'Pregunta ' . $pregunta->question_number . '/' . $cantidad_preguntas . ': '
         . $pregunta->enunciado;

        MensajeController::cargar_pregunta_respuestas($texto, session('contador'));

        return;


    }

    public static function call_next_question() {
        MensajeController::borrar_teclado();
        
        $callback_array = explode(',', parent::$callback );
        
        $pregunta = Encuesta::get_question($callback_array[1]);
        $cantidad_preguntas = Encuesta::get_preguntas_count();

        $user_id = Encuesta::get_user_id(session('chat_id'))[0]->id;
        //$respuesta_cache = self::set_cache_valor(explode(',', parent::$callback)[2]);
        //Storage::put('question_1', explode(',', parent::$callback)[1]);//Test line
        //Storage::append('question_1', json_encode($user_id));//Test line
        //Storage::append('question_1', json_encode(parent::$callback));//Test line
        
        if (isset($pregunta->id)) {

            session()->put('contador', $pregunta->id);
            $texto = 'Pregunta ' . $pregunta->question_number . '/' . $cantidad_preguntas . ': 
            ' . $pregunta->enunciado;
            MensajeController::cargar_pregunta_respuestas($texto, session('contador'));

            $data = [
                [
                    'id_usuario' => $user_id,
                    'chat_id' => session('chat_id'),
                    'id_pregunta' => explode(',', parent::$callback)[1],
                    'id_respuesta' => explode(',', parent::$callback)[2],
                    'fecha_unix' => time()
                ]
            ];
            

            Encuesta::set_respuestas_encuesta($data);


        }else {
            //Responses::set_new_chat_id();
            $data = [
                [
                    'id_usuario' => $user_id,
                    'chat_id' => session('chat_id'),
                    'id_pregunta' => explode(',', parent::$callback)[1],
                    'id_respuesta' => explode(',', parent::$callback)[2],
                    'fecha_unix' => time()
                ]
            ];
            

            Encuesta::set_respuestas_encuesta($data);
            MensajeController::abort_message();
            Encuesta::set_encuesta_completed(session('chat_id'));
            
            Responses::calcular_dsi_por_competencia(session('chat_id'));

        }

    }

    private static function set_cache_clave($clave) {
        return Cache::put('clave', $clave);
    }

    private static function set_cache_valor($valor, $tiempo_cache_minutes = 2) : array {
        $clave_cache = Cache::get('clave');

        Cache::put($clave_cache, $valor, now()->addMinutes($tiempo_cache_minutes));
        $array_registro_to_db = [$clave_cache, Cache::get($clave_cache)];
        return $array_registro_to_db;
    }
}
