<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MensajeController as Mensajes;


use App\Models\Encuesta;

class ResponsesController extends Controller
{
    public static $first_name;
    public static $last_name;
    public static $username;
    public static $id_sexo;
    public static $id_educacion;
    public static $id_edad;
    public static $id_institucion;
    public static array $array_datos;

    public static function start() {
        
        //self::set_new_chat_id();
        self::mensaje_bienvenida();

    }
    
    public static function set_new_chat_id() {
        
        $datos_init_encuestado = [
            'chat_id' => session('chat_id'),
            'chat_first_name' =>  self::$first_name,
            'chat_last_name' =>  self::$last_name,
            'chat_username' => self::$username,
            'id_sexo' => self::$id_sexo,
            'id_educacion' => self::$id_educacion,
            'id_edad' => self::$id_edad,
            'id_institucion' => self::$id_institucion,
        ];
        
        Encuesta::set_init_case($datos_init_encuestado);
        
    }

    private static function mensaje_bienvenida() {
        
        Mensajes::send_mensaje_bienvenida();

    }

    public static function usuario_existente() {
        Mensajes::send_mensaje_usuario_existente();
    }


    public static function cargar_pregunta() {
        $data_preguntas_respuestas = Encuesta::get_respuestas_por_pregunta(parent::$current_id);
        



        Mensajes::build_pregunta_respuestas();

        //Storage::put('comiinnngggg_13.txt', $data_preguntas_respuestas );
    }


}
