<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Encuesta extends Model
{
    use HasFactory;

    public static function set_init_case($data) {
        DB::table('usuarios')->insert([
            'chat_id' => session('chat_id'),
            'chat_first_name' => $data['chat_first_name'],
            'chat_last_name' => $data['chat_last_name'],
            'chat_username' => (isset($data['chat_username']) ? $data['chat_username'] : $data['chat_first_name']),
            'id_tipo_usuario' => 3,
            'complete' => 0,
            'fecha_unix_start' => time()
        ]);
    }


    public static function get_all_chat_id()  {
        return DB::table('usuarios')
        ->select('chat_id', 'chat_first_name')->get();
    }

    public static function get_user_id($chat_id) {
        return DB::table('usuarios')
        ->select('id')
        ->where('chat_id', '=', $chat_id)
        ->get();
    }

    /**revisar si hay que borrar este funcion */
    public static function get_preguntas_count() {
        return DB::table('preguntas')
        ->where('active_question', 1)
        ->count();
    }

    public static function get_question($id_pregunta) {
        return DB::table('preguntas')
        ->where('id', '>', $id_pregunta)
        ->where('active_question', 1)
        ->first();
    }

    public static function get_respuestas_por_pregunta($id_pregunta) {
        return DB::table('respuestas')
        ->select('respuestas.id', 'respuestas.respuesta', 'preguntas.question_number')
        ->join('preguntas_respuestas', 'preguntas_respuestas.id_respuesta', '=' , 'respuestas.id')
        ->join('preguntas', 'preguntas.id', '=', 'preguntas_respuestas.id_pregunta')
        ->where('preguntas_respuestas.id_pregunta', $id_pregunta)
        ->where('preguntas.active_question', 1)
        ->get();
    }

    public static function get_campo_datos_informativos($index) {
        return DB::table('campos_datos_informativos')
        ->where('id', '>', $index)
        ->first();
    }

    public static function get_instituciones($tbl_slug) {
        return DB::table($tbl_slug)
        ->get();
    }

    public static function get_usuario_field($id_field_datos) {
        return DB::table('campos_datos_informativos')
        ->select('usuario_field')
        ->where('id', $id_field_datos)
        ->first();
    }

    public static function set_datos_demograficos($chat_id, $campo, $valor) {
        //$registro = Encuesta::find($datos['chat_id']);
        //Storage::append('question_1', json_encode($registro));//Test line

        //$registro->$datos('campo') = $datos('valor');
        //$registro->save();
        DB::table('usuarios')
        ->where('chat_id', $chat_id)
        ->update([$campo => $valor]);
    }

    public static function set_respuestas_encuesta($data) {
        //$registro = Encuesta::find($datos['chat_id']);
        //Storage::append('question_1', json_encode($registro));//Test line

        //$registro->$datos('campo') = $datos('valor');
        //$registro->save();
        DB::table('usuario_pregunta_respuesta')
        ->insert($data);
    }

    public static function set_encuesta_completed($chat_id) {
        //$registro->save();
        DB::table('usuarios')
        ->where('chat_id', $chat_id)
        ->update(['complete' => 1, 'fecha_unix_end' => time()]);
    }

    /* rexupera las respuestas y sus puntajes para dar el IDC */
    public static function get_puntaje_respuestas($chat_id) {
        return DB::table('respuestas as r')
        ->join('usuario_pregunta_respuesta as upr', 'upr.id_respuesta', '=', 'r.id')
        ->join('preguntas as p', 'p.id', '=', 'upr.id_pregunta')
        ->join('competencias_tbl', 'competencias_tbl.id', '=', 'p.competencia')
        ->where('chat_id', '=', $chat_id)
        ->where('tipo_respuesta', '=', 1)
        ->where('p.tipo_pregunta', '=', 1)
        ->select('p.competencia as comp_id', 'competencias_tbl.competencia', 'r.respuesta', 'r.puntaje')
        ->get();
    }

    
}
