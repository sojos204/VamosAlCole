<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entities\Menu_Superior\T_vista_menu_header;

class HeaderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*Permite controlar las opciones de header tomando como base el idioma que se especifique*/
    public function LoadInfoMenu($idioma){
      //se optienen los valores de las diversas opciones el header en español
        if($idioma=="es"){
            $opciones = T_vista_menu_header::select('id','opcion1_es','opcion2_es','opcion3_es',
                                       'opcion4_es','sub1_opcion4_es','sub2_opcion4_es',
                                         'sub3_opcion4_es')->get();
        }
        //se optienen los valores de las diversas opciones el header en cabecar
        if($idioma=="cabecar"){
            $opciones = T_vista_menu_header::select('id','opcion1_es','opcion2_es','opcion3_es',
                                       'opcion4_es','sub1_opcion4_es','sub2_opcion4_es',
                                         'sub3_opcion4_es')->get();
        }
        //se optienen los valores de las diversas opciones el header en ingles
        if($idioma=="en"){
            $opciones = T_vista_menu_header::select('id','opcion1_es','opcion2_es','opcion3_es',
                                       'opcion4_es','sub1_opcion4_es','sub2_opcion4_es',
                                         'sub3_opcion4_es')->get();
        }
        return $opciones;
    }/*end LoadInfoHome*/

}
