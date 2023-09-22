<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Encuesta extends Model
{
    use HasFactory;

    public static function set_init_case($data) {
        DB::table('usuarios')->insert([
            'chat_id' => $data['chat_id'],
            'chat_first_name' => $data['chat_first_name'],
            'chat_last_name' => $data['chat_last_name'],
            'chat_username' => (isset($data['chat_username']) ? $data['chat_username'] : $data['chat_first_name'])
        ]);
    }

    public static function get_all_chat_id()  {
        return DB::table('usuarios')
        ->select('chat_id', 'chat_first_name')->get();
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
}
