<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\InfoVocacionalTraduccion;
use App\InstitucionTraduccion;

class TraduccionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /**Retorna los datos traducidos de la pagina informacion vocacional basandose en el idioma seleccionado */
    static public function traduccionInfoVocacional()
    {
        $idioma=session()->get('language');
        /*INICIO T_informacion_vocacional*/
        /**Retorna los datos en español */
        if($idioma=="es"){
            $traduccion = InfoVocacionalTraduccion::select('id','titulo_es', 'btn_descargar_es', 'btn_ver_mas_es')->get();

            foreach ($traduccion as $atributo)
            {
                $data['id']=$atributo->id;
                $data['titulo']=$atributo->titulo_es;
                $data['btn_descargar']=$atributo->btn_descargar_es;
                $data['btn_ver_mas']=$atributo->btn_ver_mas_es;
                $resultado[]=$data;
            }
        }
        /**Retorna los datos en cabecar */
        if($idioma=="cabecar"){
            $traduccion = InfoVocacionalTraduccion::select('id','titulo_cabecar', 'btn_descargar_cabecar', 'btn_ver_mas_cabecar')->get();
            foreach ($traduccion as $atributo)
            {
                $data['id']=$atributo->id;
                $data['titulo']=$atributo->titulo_cabecar;
                $data['btn_descargar']=$atributo->btn_descargar_cabecar;
                $data['btn_ver_mas']=$atributo->btn_ver_mas_cabecar;
                $resultado[]=$data;
            }
        }
        /**Retorna los datos en ingles */
        if($idioma=="en"){
            $traduccion = InfoVocacionalTraduccion::select('id','titulo_en', 'btn_descargar_en', 'btn_ver_mas_en')->get();
            foreach ($traduccion as $atributo)
            {
                $data['id']=$atributo->id;
                $data['titulo']=$atributo->titulo_en;
                $data['btn_descargar']=$atributo->btn_descargar_en;
                $data['btn_ver_mas']=$atributo->btn_ver_mas_en;
                $resultado[]=$data;
            }
        }
        /*FIN T_informacion_vocacional*/
        return $resultado;
    }

    /**Retorna los datos traducidos de la pagina de instituciones basandose en el idioma seleccionado */
    static public function traduccionInstitucion()
    {
        $idioma=session()->get('language');
        /*INICIO T_informacion_vocacional*/
        /**Retorna los datos en español */
        if($idioma=="es"){
            $traduccion = InstitucionTraduccion::select('id','titulo_es', 'btn_mas_info_es', 'btn_ver_todos_es','sobreNosotros_es','nuestraOfertaAcademica_es','servicios_es','horarios_es','fechasImportantes_es','contactos_es')->get();

            foreach ($traduccion as $atributo)
            {
                $data['id']=$atributo->id;
                $data['titulo']=$atributo->titulo_es;
                $data['btn_mas_info']=$atributo->btn_mas_info_es;
                $data['btn_ver_todos']=$atributo->btn_ver_todos_es;
                $data['sobreNosotros']=$atributo->sobreNosotros_es;
                $data['nuestraOfertaAcademica']=$atributo->nuestraOfertaAcademica_es;
                $data['servicios']=$atributo->servicios_es;
                $data['horarios']=$atributo->horarios_es;
                $data['fechasImportantes']=$atributo->fechasImportantes_es;
                $data['contactos']=$atributo->contactos_es;
                $resultado[]=$data;
            }
        }

        /**Retorna los datos en cabecar */
        if($idioma=="cabecar"){
            $traduccion = InstitucionTraduccion::select('id','titulo_cabecar', 'btn_mas_info_cabecar', 'btn_ver_todos_cabecar','sobreNosotros_cabecar','nuestraOfertaAcademica_cabecar','servicios_cabecar','horarios_cabecar','fechasImportantes_cabecar','contactos_cabecar')->get();

            foreach ($traduccion as $atributo)
            {
                $data['id']=$atributo->id;
                $data['titulo']=$atributo->titulo_cabecar;
                $data['btn_mas_info']=$atributo->btn_mas_info_cabecar;
                $data['btn_ver_todos']=$atributo->btn_ver_todos_cabecar;
                $data['sobreNosotros']=$atributo->sobreNosotros_cabecar;
                $data['nuestraOfertaAcademica']=$atributo->nuestraOfertaAcademica_cabecar;
                $data['servicios']=$atributo->servicios_cabecar;
                $data['horarios']=$atributo->horarios_cabecar;
                $data['fechasImportantes']=$atributo->fechasImportantes_cabecar;
                $data['contactos']=$atributo->contactos_cabecar;
                $resultado[]=$data;
            }
        }

        /**Retorna los datos en ingles */
        if($idioma=="en"){
            $traduccion = InstitucionTraduccion::select('id','titulo_en', 'btn_mas_info_en', 'btn_ver_todos_en','sobreNosotros_en','nuestraOfertaAcademica_en','servicios_en','horarios_en','fechasImportantes_en','contactos_en')->get();

            foreach ($traduccion as $atributo)
            {
                $data['id']=$atributo->id;
                $data['titulo']=$atributo->titulo_en;
                $data['btn_mas_info']=$atributo->btn_mas_info_en;
                $data['btn_ver_todos']=$atributo->btn_ver_todos_en;
                $data['sobreNosotros']=$atributo->sobreNosotros_en;
                $data['nuestraOfertaAcademica']=$atributo->nuestraOfertaAcademica_en;
                $data['servicios']=$atributo->servicios_en;
                $data['horarios']=$atributo->horarios_en;
                $data['fechasImportantes']=$atributo->fechasImportantes_en;
                $data['contactos']=$atributo->contactos_en;
                $resultado[]=$data;
            }
        }
        /*FIN T_informacion_vocacional*/
        return $resultado;
    }
}