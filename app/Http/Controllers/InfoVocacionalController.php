<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Entities\Pages\Info_Vocacional\T_informacion_vocacional;
use App\Entities\Pages\Info_Vocacional\T_responsable;
use App\Entities\Pages\Info_Vocacional\T_video_informacion;
use App\Entities\Pages\Info_Vocacional\T_archivos_informacion;
use App\Entities\Pages\Info_Vocacional\T_imagen_informacion;
use ZipArchive;

class InfoVocacionalController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*Se selecciona la informacion referente a las diversas informacion vocacional*/
    static public function infoVocacional()
    {
        $idioma=session()->get('language');
        /*INICIO T_informacion_vocacional*/
        /*Se selecciona la informacion vocacional en español, para esto se hace un join entre diversas tablas para generar una lista que incluya 
        el id de la informacion vocacional, nombre de la informacion, descripcion, el link del video y url de la imagen*/
        if($idioma=="es"){
            $informacion_vocacional = DB::table('t_informacion_vocacional')
            ->join('t_responsable','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_responsable.tn_id_informacion_vocacional')
            ->join('t_video_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_video_informacion.tn_id_informacion_vocacional')
            ->join('t_imagen_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_imagen_informacion.tn_id_informacion_vocacional')
            ->select('t_informacion_vocacional.tn_id_informacion_vocacional','t_informacion_vocacional.tc_nombre_informacion_es','t_informacion_vocacional.tc_descripcion_es','t_video_informacion.tc_video','t_imagen_informacion.tc_imagen')
            ->get();

            foreach ($informacion_vocacional as $atributo)
            {
                $data['informacion_vocacional_id']=$atributo->tn_id_informacion_vocacional;
                $data['informacion_vocacional_nombre']=$atributo->tc_nombre_informacion_es;
                if(601<=Str::length($atributo->tc_descripcion_es)){
                    $data['informacion_vocacional_descripcion']=Str::limit($atributo->tc_descripcion_es, 600);
                    $data['descripcion_truncada']=1;
                }else{
                    $data['informacion_vocacional_descripcion']=$atributo->tc_descripcion_es;
                    $data['descripcion_truncada']=0;
                }
                $data['video_vocacional_url']=$atributo->tc_video;
                $data['imagen_vocacional_url']=$atributo->tc_imagen;
                $resultado[]=$data;
            }
        }

        /*Se selecciona la informacion vocacional en cabecar, para esto se hace un join entre diversas tablas para generar una lista que incluya 
        el id de la informacion vocacional, nombre de la informacion, descripcion, el link del video y url de la imagen*/
        if($idioma=="cabecar"){
            $informacion_vocacional = DB::table('t_informacion_vocacional')
            ->join('t_responsable','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_responsable.tn_id_informacion_vocacional')
            ->join('t_video_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_video_informacion.tn_id_informacion_vocacional')
            ->join('t_imagen_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_imagen_informacion.tn_id_informacion_vocacional')
            ->select('t_informacion_vocacional.tn_id_informacion_vocacional','t_informacion_vocacional.tc_nombre_informacion_cabecar','t_informacion_vocacional.tc_descripcion_cabecar','t_video_informacion.tc_video','t_imagen_informacion.tc_imagen')
            ->get();

            foreach ($informacion_vocacional as $atributo)
            {
                $data['informacion_vocacional_id']=$atributo->tn_id_informacion_vocacional;
                $data['informacion_vocacional_nombre']=$atributo->tc_nombre_informacion_cabecar;
                if(601<=Str::length($atributo->tc_descripcion_cabecar)){
                    $data['informacion_vocacional_descripcion']=Str::limit($atributo->tc_descripcion_cabecar, 600);
                    $data['descripcion_truncada']=1;
                }else{
                    $data['informacion_vocacional_descripcion']=$atributo->tc_descripcion_cabecar;
                    $data['descripcion_truncada']=0;
                }
                $data['video_vocacional_url']=$atributo->tc_video;
                $data['imagen_vocacional_url']=$atributo->tc_imagen;
                $resultado[]=$data;
            }
        }

        /*Se selecciona la informacion vocacional en ingles, para esto se hace un join entre diversas tablas para generar una lista que incluya 
        el id de la informacion vocacional, nombre de la informacion, descripcion, el link del video y url de la imagen*/
        if($idioma=="en"){
            $informacion_vocacional = DB::table('t_informacion_vocacional')
            ->join('t_responsable','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_responsable.tn_id_informacion_vocacional')
            ->join('t_video_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_video_informacion.tn_id_informacion_vocacional')
            ->join('t_imagen_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_imagen_informacion.tn_id_informacion_vocacional')
            ->select('t_informacion_vocacional.tn_id_informacion_vocacional','t_informacion_vocacional.tc_nombre_informacion_en','t_informacion_vocacional.tc_descripcion_en','t_video_informacion.tc_video','t_imagen_informacion.tc_imagen')
            ->get();

            foreach ($informacion_vocacional as $atributo)
            {
                $data['informacion_vocacional_id']=$atributo->tn_id_informacion_vocacional;
                $data['informacion_vocacional_nombre']=$atributo->tc_nombre_informacion_en;
                if(601<=Str::length($atributo->tc_descripcion_en)){
                    $data['informacion_vocacional_descripcion']=Str::limit($atributo->tc_descripcion_en, 600);
                    $data['descripcion_truncada']=1;
                }else{
                    $data['informacion_vocacional_descripcion']=$atributo->tc_descripcion_en;
                    $data['descripcion_truncada']=0;
                }
                $data['video_vocacional_url']=$atributo->tc_video;
                $data['imagen_vocacional_url']=$atributo->tc_imagen;
                $resultado[]=$data;
            }
        }
        /*FIN T_informacion_vocacional*/
        return $resultado;
    }

    /* Retorna toda la informacion de una unica informacion vocacional, para esto se hace un join entre diversas tablas para generar una lista que incluya 
        el id de la informacion vocacional, nombre de la informacion, descripcion, el link del video y url de la imagen */
    public function verMasInformacionVocacional($informacion_vocacional_id)
    {
        $idioma=session()->get('language');
        /*INICIO T_informacion_vocacional*/
        /*Retorna la informacion en español cuando es este el idioma seleccionado*/
        if($idioma=="es"){
            $informacion_vocacional = DB::table('t_informacion_vocacional')
            ->join('t_responsable','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_responsable.tn_id_informacion_vocacional')
            ->join('t_video_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_video_informacion.tn_id_informacion_vocacional')
            ->join('t_imagen_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_imagen_informacion.tn_id_informacion_vocacional')
            ->select('t_informacion_vocacional.tn_id_informacion_vocacional','t_informacion_vocacional.tc_nombre_informacion_es','t_informacion_vocacional.tc_descripcion_es','t_video_informacion.tc_video','t_imagen_informacion.tc_imagen')
            ->where('t_informacion_vocacional.tn_id_informacion_vocacional','=',$informacion_vocacional_id)
            ->get();

            foreach ($informacion_vocacional as $atributo)
            {
                $data['informacion_vocacional_id']=$atributo->tn_id_informacion_vocacional;
                $data['informacion_vocacional_nombre']=$atributo->tc_nombre_informacion_es;
                $data['informacion_vocacional_descripcion']=$atributo->tc_descripcion_es;
                $data['video_vocacional_url']=$atributo->tc_video;
                $data['imagen_vocacional_url']=$atributo->tc_imagen;
            }

        }

        /*Retorna la informacion en cabecar cuando es este el idioma seleccionado*/
        if($idioma=="cabecar"){
            $informacion_vocacional = DB::table('t_informacion_vocacional')
            ->join('t_responsable','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_responsable.tn_id_informacion_vocacional')
            ->join('t_video_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_video_informacion.tn_id_informacion_vocacional')
            ->join('t_imagen_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_imagen_informacion.tn_id_informacion_vocacional')
            ->select('t_informacion_vocacional.tn_id_informacion_vocacional','t_informacion_vocacional.tc_nombre_informacion_cabecar','t_informacion_vocacional.tc_descripcion_cabecar','t_video_informacion.tc_video','t_imagen_informacion.tc_imagen')
            ->where('t_informacion_vocacional.tn_id_informacion_vocacional','=',$informacion_vocacional_id)
            ->get();

            foreach ($informacion_vocacional as $atributo)
            {
                $data['informacion_vocacional_id']=$atributo->tn_id_informacion_vocacional;
                $data['informacion_vocacional_nombre']=$atributo->tc_nombre_informacion_cabecar;
                $data['informacion_vocacional_descripcion']=$atributo->tc_descripcion_cabecar;
                $data['video_vocacional_url']=$atributo->tc_video;
                $data['imagen_vocacional_url']=$atributo->tc_imagen;
            }
        }

        /*Retorna la informacion en ingles cuando es este el idioma seleccionado*/
        if($idioma=="en"){
            $informacion_vocacional = DB::table('t_informacion_vocacional')
            ->join('t_responsable','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_responsable.tn_id_informacion_vocacional')
            ->join('t_video_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_video_informacion.tn_id_informacion_vocacional')
            ->join('t_imagen_informacion','t_informacion_vocacional.tn_id_informacion_vocacional','=','t_imagen_informacion.tn_id_informacion_vocacional')
            ->select('t_informacion_vocacional.tn_id_informacion_vocacional','t_informacion_vocacional.tc_nombre_informacion_en','t_informacion_vocacional.tc_descripcion_en','t_video_informacion.tc_video','t_imagen_informacion.tc_imagen')
            ->where('t_informacion_vocacional.tn_id_informacion_vocacional','=',$informacion_vocacional_id)
            ->get();

            foreach ($informacion_vocacional as $atributo)
            {
                $data['informacion_vocacional_id']=$atributo->tn_id_informacion_vocacional;
                $data['informacion_vocacional_nombre']=$atributo->tc_nombre_informacion_en;
                $data['informacion_vocacional_descripcion']=$atributo->tc_descripcion_en;
                $data['video_vocacional_url']=$atributo->tc_video;
                $data['imagen_vocacional_url']=$atributo->tc_imagen;
            }
        }
        
        /*FIN T_informacion_vocacional*/
       return view("paginas.infoVocacionalAmpliada",array("informacion_vocacional"=>$data));
    }

    /** */
    static public function cargarT_archivos_informacion()
    {
        /*INICIO T_archivos_informacion*/
        $archivos_vocacional = T_archivos_informacion::select('tn_id_archivo','tn_id_informacion_vocacional','tc_archivo')->get();
        $data[]=array();
        $resultado[]=array();
        foreach ($archivos_vocacional as $atributo)
        {
            $data['archivos_vocacional_id']=$atributo->tn_id_archivo;
            $data['archivos_vocacional_info_id']=$atributo->tn_id_informacion_vocacional;
            $data['archivos_vocacional_url']=$atributo->tc_archivo;
            $resultado[]=$data;
        }
        /*FIN T_archivos_informacion*/ 
        echo $resultado[1]['archivos_vocacional_id'];
        return $resultado;
    }

    /*Se recibe la url de un archivo para descagrar, si el archivo existe se genera la descarga, se renombra el archivo que se va a descargar
    y luego se elimina el archivo original */
    protected function descargarArchivo($src){
        /*se consulta si el archivo existe*/
        if (is_file($src)) {
            // El nombre con el que se descarga
            $nombreAmigable = "material informacion vocacional.zip";
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=$nombreAmigable");
            // Leer el contenido binario del zip y enviarlo
            readfile($src);
            unlink($src);
           return true;
        }else{
            return false;
        } 
    }

    /*Recibe un id de informacion vocacional con el cual selecciona todos los archivos que tiene relacion con este id
    luego se genera un archivo .zip con todos estos archivos para luego llamar a otra funcion que va a descargar este archivo .zip*/
    public function descargar( $informacion_vocacional_id){

        /*INICIO T_archivos_informacion*/
        $archivos_vocacional = T_archivos_informacion::select('tn_id_archivo','tn_id_informacion_vocacional','tc_archivo')->where('tn_id_informacion_vocacional','=',$informacion_vocacional_id)->get();
        $data[]=array();
        $resultado[]=array();
        foreach ($archivos_vocacional as $atributo)
        {
            $data['archivos_vocacional_id']=$atributo->tn_id_archivo;
            $data['archivos_vocacional_info_id']=$atributo->tn_id_informacion_vocacional;
            $data['archivos_vocacional_url']=$atributo->tc_archivo;
            $resultado[]=$data;
        }
        /*FIN T_archivos_informacion*/
        $zip = new ZipArchive();
        // Se genera un nombre para el archivo .zip
        $nombreArchivoZip = "../../frontend/public/infoVocacional/".$resultado[1]['archivos_vocacional_info_id']."/files/". $resultado[1]['archivos_vocacional_info_id'].".zip";

        //si el archivo .zip existe se abre, sino se crea
        if (!$zip->open($nombreArchivoZip, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            exit("Error abriendo ZIP en $nombreArchivoZip");
        }

        //se van adjuntando todos los documentos al .zip
        for ($i=1; $i < count($resultado); $i++) { 
            $nombre = basename("../../frontend/public/infoVocacional/".$resultado[$i]['archivos_vocacional_info_id']."/files/". $resultado[$i]['archivos_vocacional_url']);
            $zip->addFile("../../frontend/public/infoVocacional/".$resultado[$i]['archivos_vocacional_info_id']."/files/". $resultado[$i]['archivos_vocacional_url'], $nombre);
        }

        // No olvides cerrar el archivo
        $resultado = $zip->close();
        if (!$resultado) {
            exit("Error creando archivo");
        }

        // llama a la funcion que va a generar la descarga del archivo .zip
        if(!$this->descargarArchivo($nombreArchivoZip)){
            return redirect()->back();
        }
    }   
}