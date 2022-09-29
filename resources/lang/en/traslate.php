<?php
use Illuminate\Support\Facades\DB;
use App\Entities\Menu_Superior\T_vista_menu_header;
use App\Entities\Pages\T_vista_home;
use App\Http\Controllers\InfoVocacionalController;

use App\Http\Controllers\InstitucionController;
/*Esta parte es del Menú del Header*/
$opciones = T_vista_menu_header::select('id','opcion1_en','opcion2_en','opcion3_en'
                                         ,'opcion4_en','sub1_opcion4_en','sub2_opcion4_en',
                                         'sub3_opcion4_en')->get();
foreach ($opciones as $opcion)
    {
        $menu_superior_opcion1 = $opcion->opcion1_en;
        $menu_superior_opcion2 = $opcion->opcion2_en;
        $menu_superior_opcion3 = $opcion->opcion3_en;
        $menu_superior_opcion4 = $opcion->opcion4_en;
        $menu_superior_opcion4_sub1 = $opcion->sub1_opcion4_en;
        $menu_superior_opcion4_sub2  = $opcion->sub2_opcion4_en;
        $menu_superior_opcion4_sub3  = $opcion->sub3_opcion4_en;
    }  
/*FIN del Menú del Header*/ 
/*Esta parte es de la Página HOME*/
$vista_home = T_vista_home::select('id','titulo_en','descripcion_en','btn_en','video_en')->get();
foreach ($vista_home as $atributo)
    {
        $vista_home_titulo = $atributo->titulo_en;
        $vista_home_descripcion = $atributo->descripcion_en;
        $vista_home_button = $atributo->btn_en;
        $vista_home_video = $atributo->video_en;
    }  
/*FIN de la Página HOME*/

/*ESTE RETURN ES EL QUE TRADUCE EL SISTEMA*/
return [
    'title-application' => 'MIDDLEWARE: Multi-language application ENGLISH !!',
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
    /*FIN de la Página HOME*/ 

];


?>
