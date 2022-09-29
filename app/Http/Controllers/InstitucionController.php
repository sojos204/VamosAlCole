<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Institucion;
use App\ImagenesInstitucion;
use App\VideosInstitucion;
use App\Telefono;
use App\RedSocial;
use App\ServiciosInstitucion;
use App\FechasImportantesInstitucion;
use App\Horarios;
use App\UbicacionInstitucion;
use App\ArchivosInstitucion;
use App\Rama;

class InstitucionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     //Retorna la informa de una institucion en concreto basandose en el id que se recibe
    public function detalleInstitucion($idInstitucion)
    {
        $idioma = session()->get('language');

        //se selecciona la informacion de la institucion segun el idioma seleccionado, para este caso español
        if($idioma=="es"){
            $infoInstituciones = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion',  'tc_descripcion_institucion_es AS tc_descripcion_institucion')
            ->where('tn_id_institucion', '=', $idInstitucion)->get();
          
           

        //se selecciona la informacion de la institucion segun el idioma seleccionado, para este caso cabecar
        }else if($idioma=="cabecar"){
            $infoInstituciones = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion', 'tc_descripcion_institucion_cabecar AS tc_descripcion_institucion')
            ->where('tn_id_institucion', '=', $idInstitucion)->get();

            //se selecciona la informacion de la institucion segun el idioma seleccionado, para este caso ingles
        }else if($idioma=="en"){
            $infoInstituciones = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion', 'tc_descripcion_institucion_en AS tc_descripcion_institucion')
            ->where('tn_id_institucion', '=', $idInstitucion)->get();
        }

        //se retorna la lista de archivos ligados a la institucion
        $listaArchivos = ArchivosInstitucion::select('tn_id_archivo','tc_archivo', 'tn_id_institucion')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //retorna la lista de imagenes ligadas a la institucion
        $listaImagenes = ImagenesInstitucion::select('tn_id_imagen','tc_imagen', 'tn_id_institucion')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //retorna los videos ligados a la institucion
        $listaVideos = VideosInstitucion::select('tn_id_video','tc_video', 'tn_id_institucion', 'tn_tipo_video')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //retorna la lista de telefonos ligados a la institucion
        $listaTelefonos = Telefono::select('tn_id_telefono', 'tc_descripcion_telefono', 'tc_telefono', 'tn_id_institucion')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //retorna la lista de redes sociales ligadas a la institucion
        $listaRedesSociales = RedSocial::select('tn_id_redes', 'tc_descripcion_redes', 'tc_redes', 'tn_id_institucion')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //se retorna la lista de ubicaciones de la institucion
        $listaUbicacion = UbicacionInstitucion::select('tn_id_ubicacion', 'tc_descripcion_ubicacion', 'tn_id_institucion')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //retorna la lista de servicion ligadas a la institucion
        $listaServicios = ServiciosInstitucion::select('tn_id_servicio','tc_descripcion_servicio', 'tn_id_institucion')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //retorna la lista de horarios ligadas a la institucion
        $listaHorarios = Horarios::select('tn_id_horarios','tc_dia', 'tc_hora_inicio','tc_hora_final', 'tn_id_institucion')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //retorna la lista de fechas importantes ligadas a la institucion
        $listaFechasImportantes = FechasImportantesInstitucion::select('tn_id_fecha','tn_id_institucion', 'tc_fecha', 'tc_descripcion')
        ->where('tn_id_institucion', '=', $idInstitucion)->get();

        //retorna a la vista con toda la informacion necesaria para que se puede cargar
        return view("paginas.institucion", array("infoInstituciones"=>$infoInstituciones, "listaTelefonos"=>$listaTelefonos, "listaRedesSociales"=>$listaRedesSociales, "listaUbicacion" => $listaUbicacion,
        "listaArchivos" => $listaArchivos, "listaImagenes"=>$listaImagenes, "listaVideos"=>$listaVideos, "listaServicios"=>$listaServicios, "listaHorarios"=>$listaHorarios, "listaFechasImportantes"=>$listaFechasImportantes)) ;
    }

    /*retorna una lista de instituciones, circuitos y todas las ramas existentes*/
    public function listaInstituciones()
    {
        //seleciona la lista de instituciones activas en el sistema
        $listaInstituciones = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion')
        ->where('tb_estado_institucion', '=', 1)->get();

        //retorna todas las ramas
        $listaRamas = Rama::all();

        //$listaCircuitos= Circuito::select('tn_id_circuito','tc_nombre_circuito')->get();

        //retorna todos los circuitos de las sedes regionales que se encuentran activos
        $listaCircuitos = DB::table('t_circuito')
        ->join('t_direccion_regional','t_direccion_regional.id','=','t_circuito.tn_id_direccion_regional')
        ->select('t_circuito.tn_id_circuito','t_circuito.tc_nombre_circuito','t_direccion_regional.tc_nombre AS DireccionRegional')
        ->where('t_direccion_regional.tn_estado', 1)
        ->get();

        //retorna la vista con toda la informacion necesaria para que se cargue todo
        return view("paginas.listaInstituciones", array("listaInstituciones"=>$listaInstituciones, "listaCircuitos"=>$listaCircuitos, "listaRamas"=>$listaRamas));
    }

    //retorna una lista de instituciones basandose en un circuito y rama especifica
    public function GetCircuitos(Request $request){
        $circuito = $request->circuito;
        $rama = $request->rama;
        //file_put_contents("hola.txt",$rama);
        if($circuito>=0){
        $listaInstituciones = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion')
        ->where('tn_id_circuito', $circuito)
        ->where('tn_id_rama', $rama)
        ->where('tb_estado_institucion', 1)
        ->get();
        }else{
        $listaInstituciones = Institucion::select('tn_id_institucion','tc_nombre_institucion', 'tc_logo_institucion')
        ->where('tb_estado_institucion', 1)
        ->where('tn_id_rama', $rama)
        ->get();
        }

        //retorna la lista de instituciones
        return $listaInstituciones;
    }
}
