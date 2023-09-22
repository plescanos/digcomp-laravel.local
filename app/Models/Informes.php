<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Informes extends Model
{
    use HasFactory;

    public function get_universe($org_id) {
        $universo =  DB::table('institucion')
        ->where('id', $org_id)
        ->first();

        return $universo;
    }

    public function get_muestra($org_id) {
        return DB::table('usuarios')
        ->where('id_institucion', $org_id)
        ->count();
    }

    public function get_count_nivel_competencia($id_respuesta, $org_id, $competencia_id) {
        return DB::table('usuario_pregunta_respuesta')
        ->join('usuarios', 'usuarios.id', '=', 'usuario_pregunta_respuesta.id_usuario')
        ->join('preguntas', 'preguntas.id', '=', 'usuario_pregunta_respuesta.id_pregunta')
        ->join('competencias_tbl', 'competencias_tbl.id', '=', 'preguntas.competencia')
        ->where('competencias_tbl.id', $competencia_id)
        ->where('preguntas.active_question', 1)
        ->where('usuario_pregunta_respuesta.id_respuesta', $id_respuesta)
        ->where('usuarios.id_institucion', $org_id)
        ->count();
    }

    public function get_respuestas() {
        return DB::table('respuestas')
        ->select('id', 'respuesta', 'nivel_slug')
        ->where('tipo_respuesta', 1)
        ->get();
    }

    public function get_competencias() {
        return DB::table('competencias_tbl')
        ->select('id', 'competencia')
        ->get();
    }

    public function get_genero() {
        return DB::table('sexo_tbl')
        ->get();
    }

    public function get_edad() {
        return DB::table('edad_tbl')
        ->get();
    }

    public function get_educacion() {
        return DB::table('educacion_tbl')
        ->get();
    }

    public function get_count_preguntas_competencia($competencia_id) {
        return DB::table('preguntas')
        ->where('competencia', $competencia_id)
        ->where('tipo_pregunta', 1)
        ->where('active_question', 1)
        ->count();
    }

    public function get_result_genero($org_id, $id_sexo, $id_respuesta) {
        return DB::table('usuario_pregunta_respuesta')
        ->join('preguntas', 'preguntas.id', '=' , 'usuario_pregunta_respuesta.id_pregunta')
        ->join('usuarios', 'usuarios.id', '=' , 'usuario_pregunta_respuesta.id_usuario')
        ->where('usuario_pregunta_respuesta.id_respuesta', $id_respuesta)
        ->where('preguntas.active_question', 1)
        ->where('preguntas.tipo_pregunta', 1)
        ->where('usuarios.id_institucion', $org_id)
        ->where('usuarios.id_sexo', $id_sexo)
        ->count()
        ;
    }

    public function get_result_edad($org_id, $id_edad, $id_respuesta) {
        return DB::table('usuario_pregunta_respuesta')
        ->join('preguntas', 'preguntas.id', '=' , 'usuario_pregunta_respuesta.id_pregunta')
        ->join('usuarios', 'usuarios.id', '=' , 'usuario_pregunta_respuesta.id_usuario')
        ->where('usuario_pregunta_respuesta.id_respuesta', $id_respuesta)
        ->where('preguntas.active_question', 1)
        ->where('preguntas.tipo_pregunta', 1)
        ->where('usuarios.id_institucion', $org_id)
        ->where('usuarios.id_edad', $id_edad)
        ->count()
        ;
    }
    
    public function get_result_educacion($org_id, $id_educacion, $id_respuesta) {
        return DB::table('usuario_pregunta_respuesta')
        ->join('preguntas', 'preguntas.id', '=' , 'usuario_pregunta_respuesta.id_pregunta')
        ->join('usuarios', 'usuarios.id', '=' , 'usuario_pregunta_respuesta.id_usuario')
        ->where('usuario_pregunta_respuesta.id_respuesta', $id_respuesta)
        ->where('preguntas.active_question', 1)
        ->where('preguntas.tipo_pregunta', 1)
        ->where('usuarios.id_institucion', $org_id)
        ->where('usuarios.id_educacion', $id_educacion)
        ->count()
        ;
    }
}
