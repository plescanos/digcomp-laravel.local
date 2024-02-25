<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MensajeController as Mensajes;


use App\Models\Encuesta;
use App\Models\Respuesta;
use App\Models\Level;
use App\Models\Competencia;

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
        
        self::set_new_chat_id();
        self::mensaje_bienvenida();

    }
    

    public static function set_new_chat_id() {
        
        $datos_init_encuestado = [
            'chat_id' => session('chat_id'),
            'chat_first_name' =>  parent::$first_name,
            'chat_last_name' =>  parent::$last_name,
            'chat_username' => parent::$username,
/*             'id_sexo' => self::$id_sexo,
            'id_educacion' => self::$id_educacion,
            'id_edad' => self::$id_edad,
            'id_institucion' => self::$id_institucion, */
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

    public static function deleteChat($chat_id) {
        /* $bot = new \TelegramBot\Api\Client('6519055141:AAFAGMm7ci2C79HHUKEpK3RbbcLVQpUIyQ0');
        $bot->deleteChat($chat_id); */
    }

    public static function calcular_dsi_global($chat_id) {


        $respuestas['preguntas_qty'] = Respuesta::join('usuario_pregunta_respuesta as upr', 'upr.id_respuesta', '=', 'respuestas.id')
        ->where('upr.chat_id', '=', $chat_id)
        ->where('respuestas.tipo_respuesta', '=', 1)
        ->select('puntaje')
        ->count();

        $respuestas['sumatoria'] = Respuesta::join('usuario_pregunta_respuesta as upr', 'upr.id_respuesta', '=', 'respuestas.id')
        ->where('upr.chat_id', '=', $chat_id)
        ->where('respuestas.tipo_respuesta', '=', 1)
        ->select('puntaje')
        ->sum('puntaje');

        $puntaje =  $respuestas['sumatoria'] / $respuestas['preguntas_qty'];

        $dsi = self::get_nivel_name(round($puntaje, 2));
        //Storage::append('question_1', json_encode(round($puntaje, 2)));
        
        
        MensajeController::send_dsi($dsi);

    }

    public static function calcular_dsi_por_competencia($chat_id) {

        $competencias = Competencia::all();
        foreach ($competencias as $key => $competencia) {
            /* Las sumatorias de los puntajes de las respuestas */
            $respuestas[$key]['sum_respuesta_c_' . $competencia->id] = Respuesta::join('usuario_pregunta_respuesta as upr', 'upr.id_respuesta', '=', 'respuestas.id')
            ->join('preguntas as p', 'p.id', '=', 'upr.id_pregunta')
            ->where('upr.chat_id', '=', $chat_id)
            ->where('respuestas.tipo_respuesta', '=', 1)
            ->where('p.competencia', '=', $competencia->id)
            ->sum('respuestas.puntaje');

            /* la cantidad de ppreguntas */
            $respuestas[$key]['num_pregunta_c_' . $competencia->id] = Respuesta::join('usuario_pregunta_respuesta as upr', 'upr.id_respuesta', '=', 'respuestas.id')
            ->join('preguntas as p', 'p.id', '=', 'upr.id_pregunta')
            ->where('upr.chat_id', '=', $chat_id)
            ->where('respuestas.tipo_respuesta', '=', 1)
            ->where('p.competencia', '=', $competencia->id)
            ->count('p.id');

            /* Nombre de competencia */
            $respuestas[$key]['competencia_name_' . $competencia->id] = $competencia->competencia;
            
        }
        //Storage::append('question_1', json_encode($respuestas));

        foreach ($respuestas as $key => $respuesta) {
            
            $puntaje = self::dividir_para_puntaje($respuesta['sum_respuesta_c_' . $key + 1], $respuesta['num_pregunta_c_' . $key + 1]);
            $dsi = self::get_nivel_name(round($puntaje, 2));
            MensajeController::send_dsi_by_competencia($dsi, $respuesta['competencia_name_' . $key + 1]);
        }


        return;
        

        
        

    }

    public static function dividir_para_puntaje($dividendo, $divisor) {
        return $dividendo / $divisor;
    }

    public static function get_nivel_name($puntaje) {
        $niveles = Level::all();
        foreach ($niveles as $key => $nivel) {
            if ($puntaje >= $nivel->bottom_range && $puntaje <= $nivel->top_range) {
                return $nivel->nivel_cualitativo;
            }
        }
    }



}
