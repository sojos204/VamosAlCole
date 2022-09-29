<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entities\Pages\T_vista_home;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("paginas.home");
    }

    /*Permite cargar la informacion de la pagina principal basandose en el idioma que se tenga seleccionado*/
    public function LoadInfoHome($idioma){
        //seleciona los valores para la pagina home en español
        if($idioma=="es"){
            $vista_home = T_vista_home::select('id','titulo_es','descripcion_es','btn_es','video_es')->get();
        }
        //seleciona los valores para la pagina home en cabecar
        if($idioma=="cabecar"){
            $vista_home = T_vista_home::select('id','titulo_cabecar','descripcion_cabecar','btn_cabecar','video_cabecar')->get();
        }
        //seleciona los valores para la pagina home en ingles
        if($idioma=="en"){
            $vista_home = T_vista_home::select('id','titulo_en','descripcion_en','btn_en','video_en')->get();
        }
        return $vista_home;
    }/*end LoadInfoHome*/

    public function colegios()
    {
        return view("paginas.colegios");
    }
}
