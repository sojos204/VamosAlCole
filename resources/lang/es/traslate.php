<?php
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ColegiosController;



$objetoMenu = new HeaderController();
$opciones = $objetoMenu->LoadInfoMenu("es");
foreach ($opciones as $opcion)
    {
        $menu_superior_opcion1 = $opcion->opcion1_es;
        $menu_superior_opcion2 = $opcion->opcion2_es;
        $menu_superior_opcion3 = $opcion->opcion3_es;
        $menu_superior_opcion4 = $opcion->opcion4_es;
        $menu_superior_opcion4_sub1 = $opcion->sub1_opcion4_es;
        $menu_superior_opcion4_sub2  = $opcion->sub2_opcion4_es;
        $menu_superior_opcion4_sub3  = $opcion->sub3_opcion4_es;
    }  
/*FIN del Menú del Header*/ 

/*Esta parte es de la Página HOME*/
$objetoHome = new HomeController();
$vista_home = $objetoHome->LoadInfoHome("es");
foreach ($vista_home as $atributo)
{
    $vista_home_titulo = $atributo->titulo_es;
    $vista_home_descripcion = $atributo->descripcion_es;
    $vista_home_button = $atributo->btn_es;
    $vista_home_video = $atributo->video_es;
}  
/*FIN de la Página HOME*/

// Esta es la parte del carrusel de colegios
// $infoColegiosController = new ColegiosController();
// $informacion_colegios = $infoColegiosController->cargarColegios();
// FIN del carrusel de colegios

/*ESTE RETURN ES EL QUE TRADUCE EL SISTEMA*/
return [
    'title-application' => 'MIDDLEWARE: Aplicación multi-lenguaje ESPAÑOL',
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

    // Esta parte es de la Página carrusel de colegios
    // 'informacion_colegios' => $informacion_colegios,
    // FIN de la pagina, carrusel de colegios

];


?>
