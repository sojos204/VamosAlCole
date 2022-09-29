<?php
use Illuminate\Support\Facades\DB;
use App\Entities\Menu_Superior\T_vista_menu_header;
use App\Entities\Pages\T_vista_home;
use App\Http\Controllers\InfoVocacionalController;

use App\Http\Controllers\InstitucionController;

/*Esta parte es del Menú del Header*/
$opciones = T_vista_menu_header::
            select('id','opcion1_cabecar','opcion2_cabecar','opcion3_cabecar',
                    'opcion4_cabecar','sub1_opcion4_cabecar','sub2_opcion4_cabecar',
                    'sub3_opcion4_cabecar')->get();
foreach ($opciones as $opcion)
    {
        $menu_superior_opcion1 = $opcion->opcion1_cabecar;
        $menu_superior_opcion2 = $opcion->opcion2_cabecar;
        $menu_superior_opcion3 = $opcion->opcion3_cabecar;
        $menu_superior_opcion4 = $opcion->opcion4_cabecar;
        $menu_superior_opcion4_sub1 = $opcion->sub1_opcion4_cabecar;
        $menu_superior_opcion4_sub2  = $opcion->sub2_opcion4_cabecar;
        $menu_superior_opcion4_sub3  = $opcion->sub3_opcion4_cabecar;
    }   
/*FIN del Menú del Header*/
/*Esta parte es de la Página HOME*/
$vista_home = T_vista_home::select('id','titulo_cabecar','descripcion_cabecar','btn_cabecar','video_cabecar')->get();
foreach ($vista_home as $atributo)
    {
        $vista_home_titulo = $atributo->titulo_cabecar;
        $vista_home_descripcion = $atributo->descripcion_cabecar;
        $vista_home_button = $atributo->btn_cabecar;
        $vista_home_video = $atributo->video_cabecar;
    }  
/*FIN de la Página HOME*/

/*ESTE RETURN ES EL QUE TRADUCE EL SISTEMA*/
return [
    'title-application' => 'MIDDLEWARE: Aplicación multi-lenguaje CABECAR QUIZNA BA',
    /*Esta parte es del Menú del Header*/
    'menu_superior_opcion1' => $menu_superior_opcion1,
    'menu_superior_opcion2' => $menu_superior_opcion2,
    'menu_superior_opcion3' => $menu_superior_opcion3,
    'menu_superior_opcion4' => $menu_superior_opcion4,
    'menu_superior_opcion4_sub1' => $menu_superior_opcion4_sub1,
    'menu_superior_opcion4_sub2' => $menu_superior_opcion4_sub2,
    'menu_superior_opcion4_sub3' => $menu_superior_opcion4_sub3,
    /*FIN  del Menú del Header*/
    /*Esta parte es de la Página HOME*/
    'vista_home_titulo' => $vista_home_titulo,
    'vista_home_descripcion' => $vista_home_descripcion,
    'vista_home_button' => $vista_home_button,
    'vista_home_video' => $vista_home_video,

    /*FIN del Menú del Header*/

];

?>
