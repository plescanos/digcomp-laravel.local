<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informes as InformesModel;

class Informes extends Controller
{
    public static function build_org_data($org_id) {
        $data = new InformesModel();

        $bulk_data = $data->get_universe($org_id);

        /** Recupera datos de organizacion */
        $org_data['universo'] = $bulk_data->universo;
        $org_data['nombre_organizacion'] = $bulk_data->nombre_institucion;
        
        /** Recupera la muestra del universo de la irganizacion */
        $org_data['muestra'] =  $data->get_muestra($org_id);

        /** Recupera el count de respuestas por nivel */
        $respuestas = $data->get_respuestas();
        $competencias = $data->get_competencias();

        foreach ($competencias as $key => $value) {
            foreach ($respuestas as $key_2 => $value_2) {
                
                $org_data['main_chart_dataset']['n' . $value_2->id . '_c' . $value->id] = 
                $data->get_count_nivel_competencia($value_2->id, $org_id, $value->id) /
                $data->get_count_preguntas_competencia($value->id);

            }
        }

        /** Rrspuestas generales por criterio */
        /** GENERO */
        $genero = $data->get_genero();

        foreach ($respuestas as $key => $value) {
            foreach ($genero as $key_2 => $value_2) {

                $org_data['genero'][$value_2->sexo][$value->nivel_slug] = $data->get_result_genero($org_id, $value_2->id, $value->id);
                
            }
        }
        

        /** edad */
        $edad = $data->get_edad();

        foreach ($respuestas as $key => $value) {
            foreach ($edad as $key_3 => $value_3) {

                $org_data['edad'][$value_3->id][$value->nivel_slug] = $data->get_result_edad($org_id, $value_3->id, $value->id);
                
            }
        }

        /** educacion */
        $educacion = $data->get_educacion();

        foreach ($respuestas as $key => $value) {
            foreach ($educacion as $key_3 => $value_3) {

                $org_data['educacion'][$value_3->id][$value->nivel_slug] = $data->get_result_educacion($org_id, $value_3->id, $value->id);
                
            }
        }



        return $org_data;
    }
}
