<?php
  use App\Http\Controllers\ColegiosController;
  use App\Http\Controllers\TraduccionController;
  $informacion_colegios = ColegiosController::cargarColegios();
  $institucion_traduccion=TraduccionController::traduccionInstitucion();
?>

<section class="content" id="colegios">
    <div class="container">
      <div class="row">
         
        <div class="row">

        <div class="col-sm-2">    
        </div>
        <div class="col-sm-8"> 
        <h1 class="subtituloSeccion" style="text-align:left;">{!!$institucion_traduccion[0]['titulo']!!}</h1>
        </div>
        <div class="col-sm-2">    
        </div>
        
        </div>

        <div class="col-1 col-md-2"> 
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <button class="izq" id="izq" type="submit" style="text-align:right;"><</button> 
              </a>
        </div>

        <div class="col-10 col-md-8">
            {{-- colegios --}}


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  {{-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                </ol>
                
                <div class="carousel-inner">                    
                  <div class="carousel-item active">
                      <div class="row col-sm-12">
                        <!--Crea la primer linea del carousel-->
                        @for ($i = 1; $i < 7; $i++) 
                        <div class="col-sm-4" style="text-align:center;">
                            <br>
                            <img src="{{url('/')}}/instituciones/{{$informacion_colegios[ $i ]['tn_id_institucion']}}/{{$informacion_colegios[ $i ]['tc_logo_institucion']}}" style="margin-left: 10px; margin-rigth: 10px; width=200px; height: 200px;" >
                            <br>
                            <a class="texto" href="{{url('/')}}/detalleInstitucion/{{$informacion_colegios[ $i ]['tn_id_institucion']}}" id="{{$informacion_colegios[ $i ]['tn_id_institucion']}}" style="text-align:center; margin-left: 10px; margin-rigth: 10px;"> {{$informacion_colegios[ $i ]['tc_nombre_institucion']}}</a>
                            <br><br>
                        </div>
                        @endfor
                  </div>
                </div>
                <!--Crea la segunda linea del carousel-->
                <div class="carousel-item">
                   <div class="row col-sm-12">
                      @for ($i = 7; $i < 13; $i++)
                        <div class="col-sm-4" style="text-align:center;">
                            <br>
                            <img src="{{url('/')}}/instituciones/{{$informacion_colegios[ $i ]['tn_id_institucion']}}/{{$informacion_colegios[ $i ]['tc_logo_institucion']}}"  style="margin-left: 10px; margin-rigth: 10px; width=200px; height: 200px;" >
                            <br>
                            <a class="texto" href="{{url('/')}}/detalleInstitucion/{{$informacion_colegios[ $i ]['tn_id_institucion']}}" id="{{$informacion_colegios[ $i ]['tn_id_institucion']}}" style="text-align:center; margin-left: 10px; margin-rigth: 10px;"> {{$informacion_colegios[ $i ]['tc_nombre_institucion']}}</a>
                            <br><br>
                        </div>
                      @endfor
                  </div>
                </div>

                  {{-- <div class="carousel-item">
                    <div class="row col-sm-12">
                      @for ($i = 13; $i < 19; $i++)
                          <div class="col-sm-4" style="text-align:center;">
                            <br>
                            <img src="{{url('/')}}/instituciones/{{$informacion_colegios[ $i ]['tn_id_institucion']}}/{{$informacion_colegios[ $i ]['tc_logo_institucion']}}"  style="margin-left: 10px; margin-rigth: 10px; width=200px; height: 200px;" >
                            <br>
                            <a class="texto" href="{{url('/')}}/detalleInstitucion/{{$informacion_colegios[ $i ]['tn_id_institucion']}}" id="{{$informacion_colegios[ $i ]['tn_id_institucion']}}" style="text-align:center; margin-left: 10px; margin-rigth: 10px;"> {{$informacion_colegios[ $i ]['tc_nombre_institucion']}}</a>
                            <br><br>
                          </div>                            
                      @endfor 
                      </div>
                  </div>  --}}

                </div>
              </div> 
              {{-- colegios --}}
        </div>

        <div class="col-1 col-md-2"> 
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <button class="der" id="der" type="submit" style="text-align:right;">></button> 
              </a>
        </div>

      </div>
      <div class="row">
        <div class="col-12 col-md-4">
        </div>
        <div class="col-12 col-md-4">
        </div>
        <div class="col-12 col-md-3"> 
          <form method="POST" action="">
            <a class="btn inputBotones" role="button" href="{{url('/')}}/listaInstituciones" style="text-align:right;">{!!$institucion_traduccion[0]['btn_ver_todos']!!}</a> 
          </form>    
        </div>
        <div class="col-12 col-md-1">
        </div>
      </div>
    </div>
</section>
  <!-- /.content -->
</div>
{{-- @endsection --}}