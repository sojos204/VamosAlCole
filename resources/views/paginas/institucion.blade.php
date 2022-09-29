@extends('plantilla')
<?php
    use App\Http\Controllers\TraduccionController;
    $institucion_traduccion=TraduccionController::traduccionInstitucion();
?>
@section('content')
@foreach ($infoInstituciones as $info)

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid" style="margin-top: 100px;">
      <div class="row">
            <div class="col-lg-2 order-1 order-lg-1" ></div>

            <div class="col-lg-8 order-2 order-lg-2">

                <div class="row">

                    <div class="col-lg-3 order-1 order-lg-1" >
                        <img src="{{url('/')}}/instituciones/{{ $info->tn_id_institucion }}/{{ $info->tc_logo_institucion }}" width="200" height="200"> 
                    </div>
                    
                    <div class="col-lg-9 order-2 order-lg-2">

                        <div class="col-12">
                            <h1 class="subtituloSeccion"> {!! $info->tc_nombre_institucion!!}</h1>
                        </div>
                        <br>
                        <div class="col-10">
                            <!--Descripcion-->
                            <p class="texto"> {!! $info->tc_descripcion_institucion!!}</p>

                            <br>

                            @foreach ($listaArchivos as $Archivos)
                            <div class="col-5">
                                <a href="{{url('/')}}/instituciones/{{$Archivos->tn_id_institucion}}/files/{{$Archivos->tc_archivo}}">
                                    <button class="inputBotones">{!!$institucion_traduccion[0]['btn_mas_info']!!}</button>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    
                    </div>
                </div>
                    
            </div>

            <div class="col-lg-2 order-3 order-lg-3"></div>
        
        </div>
    </div>


    <br><br>

    @if(sizeof($listaImagenes) >= 1)
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="row">
            <div class="col-lg-3 order-1 order-lg-1"></div>

            <div class="col-lg-6 order-2 order-lg-2">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        @php
         
                            $contador = 1;
                        @endphp
     
                        @foreach ($listaImagenes as $imagenes)
                        
                            @if($contador == 1)
                                <div class="carousel-item carousel-item-img active" height="100px">
                                <img src="{{url('/')}}/instituciones/{{$imagenes->tn_id_institucion}}/img/{{$imagenes->tc_imagen}}" >
                                </div>
                            @else

                                <div class="carousel-item carousel-item-img">
                                <img src="{{url('/')}}/instituciones/{{$imagenes->tn_id_institucion}}/img/{{$imagenes->tc_imagen}}">
                                </div>
                            @endif

                            @php
                                $contador++;
                            @endphp 
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        {{-- <span class="carousel-control-prev-icon"></span> --}}
                        <button class="izq" id="izq" type="submit" style="text-align:right;"><</button> 
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        {{-- <span class="carousel-control-next-icon"></span> --}}
                        <button class="der" id="der" type="submit" style="text-align:right;">></button> 
                    </a>

                </div>
                
            </div>
                
            <div class="col-lg-3 order-3 order-lg-3"></div>
        </div>
       
    </div>
    @endif

    @php
        $contadorV = 1;
    @endphp
     
   
    <br><br>
    
    <div class="container-fluid" >
        <div class="row">
            @foreach ($listaVideos as $videos)
                @if($contadorV == 1)
                    <div class="col-lg-6 order-1 order-lg-1" style="margin-top: 30px;">
                        

                        <div class="col-12" style="margin-bottom:20px;">
                            
                            <div class="row">
                                <div class="col-3"></div>

                                <div class="col-6">
                                    <h1 class="subtituloSeccion" style="text-align: center; !important">{!!$institucion_traduccion[0]['sobreNosotros']!!}</h1>      
                                </div>

                                <div class="col-3"></div>
                                            
                            </div>
                            
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-1"></div>

                                <div class="col-10">

                                    <iframe width="100%" height="350" src="{{ $videos->tc_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                
                                </div>

                                <div class="col-1"></div>
                            </div>
                        </div>
                        

                    </div>

                @endif

                @if($contadorV == 2)
                    <div class="col-lg-6 order-2 order-lg-2" style="margin-top: 30px;">


                        <div class="col-12" style="margin-bottom:20px;">

                            <div class="row">

                                <div class="col-1"></div>

                                <div class="col-10">
                                    <h1 class="subtituloSeccion" style="text-align: center; !important">{!!$institucion_traduccion[0]['nuestraOfertaAcademica']!!}</h1>      
                                </div>

                                <div class="col-1"></div>
                                            
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-1"></div>

                                <div class="col-10">
                                
                                    <iframe width="100%" height="350" src="{{ $videos->tc_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                
                                </div>

                                <div class="col-1"></div>
                            </div>
                        </div>

                    </div>
                @endif


            @php
                $contadorV++;
            @endphp 
            @endforeach    
    
        </div>
        
    </div>
                       
    
    <br><br>

    <div class="container-fluid" style="margin-top: 30px;">
        <div class="row">

            <div class="col-lg-1 order-1 order-lg-1"></div>

            <div class="col-lg-4 order-2 order-lg-2">

       
                    <h1 class="subtituloSeccion" style="margin-bottom: 20px;">{!!$institucion_traduccion[0]['servicios']!!}</h1>
                    @foreach ($listaServicios as $servicios)
                    
                    <p class="texto">{{ $servicios->tc_descripcion_servicio}}</p>
                    @endforeach

            </div>

 
            <div class="col-lg-2 order-3 order-lg-3"></div>

            <div class="col-lg-4 order-4 order-lg-4">
   
                <h1 class="subtituloSeccion" style="text-align: left; margin-bottom: 20px;">{!!$institucion_traduccion[0]['horarios']!!}</h1>

                @foreach ($listaHorarios as $Horarios)
                <p class="texto">{!! $Horarios->tc_dia!!}:  {!! $Horarios->tc_hora_inicio!!} - {!! $Horarios->tc_hora_final!!}</p>
                @endforeach

            </div>

            <div class="col-lg-1 order-5 order-lg-5"></div>
  
        </div>
        <p>
        <div class="row">

            <div class="col-lg-1 order-1 order-lg-1"></div>

            <div class="col-lg-4 order-2 order-lg-2">

                <h1 class="subtituloSeccion" style="text-align: left; margin-bottom: 20px;">{!!$institucion_traduccion[0]['fechasImportantes']!!}</h1>
                @foreach ($listaFechasImportantes as $FechasImportantes)
                <p class="texto">{!! $FechasImportantes->tc_fecha!!}  {!! $FechasImportantes->tc_descripcion !!}</p>
                @endforeach

            </div>


            <div class="col-lg-2 order-3 order-lg-3"></div>

            <div class="col-lg-4 order-4 order-lg-4">

                <h1 class="subtituloSeccion" style="text-align: left; margin-bottom: 20px;">{{$institucion_traduccion[0]['contactos']}}</h1>
                @foreach ($listaUbicacion as $Ubicacion)
                <p class="texto"> {!! $Ubicacion->tc_descripcion_ubicacion!!}</p>
                @endforeach
                @foreach ($listaTelefonos as $Telefonos)
                <p class="texto">{!! $Telefonos->tc_descripcion_telefono!!}  {!! $Telefonos->tc_telefono !!}</p>
                @endforeach
                @foreach ($listaRedesSociales as $Redes)
                <p class="texto"> {!! $Redes->tc_descripcion_redes!!} :  {!! $Redes->tc_redes !!}</p>
                @endforeach

            </div>

            <div class="col-lg-1 order-5 order-lg-5"></div>

        </div>
    </div>


  </section>
  <!-- /.content -->
</div>
@endforeach
@endsection
