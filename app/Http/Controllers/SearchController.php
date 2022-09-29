<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Institucion;

class SearchController extends Controller
{
    //permite hacer una busqueda de similitud en base a la descripcion de las instituciones
    static public function index(Request $request){
        $search  = $request->get('search');
        $idioma=session()->get('language');
        
        //bsuca la similitud en la descripcion en español
        if($idioma=="es"){
            $resultados = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion',  'tc_descripcion_institucion_es AS tc_descripcion_institucion')
            ->orWhere('tc_descripcion_institucion_es', 'like', '%' . $search . '%')->where('tb_estado_institucion', '=', 1)->get();
        }
        //bsuca la similitud en la descripcion en cabecar
        if($idioma=="cabecar"){
            $resultados = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion',  'tc_descripcion_institucion_cabecar AS tc_descripcion_institucion')
            ->orWhere('tc_descripcion_institucion_cabecar', 'like', '%' . $search . '%')->where('tb_estado_institucion', '=', 1)->get();
        }
        //bsuca la similitud en la descripcion en ingles
        if($idioma=="en"){
            $resultados = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion',  'tc_descripcion_institucion_en AS tc_descripcion_institucion')
            ->orWhere('tc_descripcion_institucion_en', 'like', '%' . $search . '%')->where('tb_estado_institucion', '=', 1)->get();
        }
        return view('paginas.search', array("resultados"=>$resultados));
    }/*fin search*/
}