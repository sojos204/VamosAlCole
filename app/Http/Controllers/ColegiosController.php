<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entities\Pages\colegios\tempCole;
use App\Institucion;

class ColegiosController extends Controller
{
    //la funcion se encarga de cargar una lista de colegios en base al idioma que se especifica ya sea español o cabecar
    //la lista de institucion cuenta con los atributos de el id de la institucion, nombre y el logo de la misma
    static public function cargarColegios(){
        $idioma=session()->get('language');
        unset($info_colegio);
        unset($data);
        unset($resultado);
        unset($atributo);

        //se obtienen las instituciones para idioma español
        if($idioma=="es"){
            $info_colegio = Institucion::select('tc_nombre_institucion','tn_id_institucion', 'tc_logo_institucion')->limit(19)->where('tb_estado_institucion', '=', 1)->get();
            $data[]=array();
            $resultado[]=array();
            foreach ($info_colegio as $atributo)
            {
                $data['tn_id_institucion']=$atributo->tn_id_institucion;
                $data['tc_nombre_institucion']=$atributo->tc_nombre_institucion;
                $data['tc_logo_institucion']=$atributo->tc_logo_institucion;
                $resultado[]=$data;
            }
        }

        //se obtienen las instituciones para el idioma cabecar
        else if($idioma=="cabecar"){
            $info_colegio = Institucion::select('tc_nombre_institucion','tn_id_institucion', 'tc_logo_institucion')->limit(19)->where('tb_estado_institucion', '=', 1)->get();
            $data[]=array();
            $resultado[]=array();
            foreach ($info_colegio as $atributo)
            {
                $data['tn_id_institucion']=$atributo->tn_id_institucion;
                $data['tc_nombre_institucion']=$atributo->tc_nombre_institucion;
                $data['tc_logo_institucion']=$atributo->tc_logo_institucion;
                $resultado[]=$data;
            }
        }

        //se obtienen las instituciones para el idioma ingles
        else if($idioma=="en"){
            $info_colegio = Institucion::select('tc_nombre_institucion','tn_id_institucion', 'tc_logo_institucion')->limit(19)->where('tb_estado_institucion', '=', 1)->get();
            $data[]=array();
            $resultado[]=array();
            foreach ($info_colegio as $atributo)
            {
                $data['tn_id_institucion']=$atributo->tn_id_institucion;
                $data['tc_nombre_institucion']=$atributo->tc_nombre_institucion;
                $data['tc_logo_institucion']=$atributo->tc_logo_institucion;
                $resultado[]=$data;
            }
        }
        return $resultado;
    }/*fin cargarColegios*/
}