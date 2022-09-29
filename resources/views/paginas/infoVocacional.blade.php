<?php
    use App\Http\Controllers\InfoVocacionalController;
    use App\Http\Controllers\TraduccionController;
    $informacion_vocacional = InfoVocacionalController::infoVocacional();
    $informacion_vocacional_traduccion=TraduccionController::traduccionInfoVocacional();
?>
<!-- Main content -->
<section class="content" id="infoVocacional">
    <div class="container-fluid">
        <div class="row">

            <h1 class="tituloSeccion" style="text-align:center;">{!!$informacion_vocacional_traduccion[0]['titulo']!!}</h1>
            <div class="col-lg-1 order-1 order-lg-1"> </div>
            <div class="col-lg-10 order-2 order-lg-2"> 
                <br> <br>
                <br> <br>
                <!-- Se define un contador para intercalar el posicionamiento de loos div para cada vuelta de ciclo, en cada ciclo se obtiene una nueva informacion vocacional
                    y se selecciona cada uno de los datos relacionados a esta    -->
                @php
                    $contador = 1;
                @endphp
                @foreach ($informacion_vocacional as $key => $info)
                    @if($contador%2!=0)
                        <div class="row">
                            <h1 class="subtituloSeccion" style="text-align:left;"> {!! $info['informacion_vocacional_nombre'] !!}</h1>
                                <br> <br>
                                <div class="col-lg-4 order-1 order-lg-1">    
                                    <img class="center img-fluid rounded" alt="Imagen" src="{{url('/')}}/infoVocacional/{{$info['informacion_vocacional_id']}}/img/{{$info['imagen_vocacional_url']}}" width="50%" height="315">
                                </div>
                                <div class="col-lg-4 order-2 order-lg-2">
                                    <p class="texto" >{!! $info['informacion_vocacional_descripcion']!!}</p>
                                    @if($info['descripcion_truncada']==1)
                                        <a class="nombreEncargados" href="{{url('/')}}/verMasInformacionVocacional/{{$info['informacion_vocacional_id']}}">{!!$informacion_vocacional_traduccion[0]['btn_ver_mas']!!}</a>
                                    @endif      
                                </div>
                                <div class="col-lg-4 order-3 order-lg-3">
                                    <iframe class="embed-responsive-item" width="100%" height="100%" src="{{$info['video_vocacional_url']}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    <br> <br>
                                    <a href="{{url('/')}}/descargar/{{$info['informacion_vocacional_id']}}">
                                        <button class="inputBotones">{!!$informacion_vocacional_traduccion[0]['btn_descargar']!!}</button>
                                    </a>
                                </div>
                            </div>
                            <br> <br>
                            <br> <br>
                    @else  
                        <div class="row"> 
                            <h1 class="subtituloSeccion" style="text-align:right;">{!!$info['informacion_vocacional_nombre']!!}</h1>
                            <br> <br>
                            <div class="col-lg-4 order-1 order-lg-1">
                                <iframe class="embed-responsive-item" width="100%" height="100%" src="{{$info['video_vocacional_url']}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                <br> <br>
                                <a href="{{url('/')}}/descargar/{{$info['informacion_vocacional_id']}}">
                                    <button class="inputBotones">{!!$informacion_vocacional_traduccion[0]['btn_descargar']!!}</button>
                                </a>
                            </div>
                            <div class="col-lg-4 order-2 order-lg-2">
                                <img class="center img-fluid rounded" alt="Imagen" src="{{url('/')}}/infoVocacional/{{$info['informacion_vocacional_id']}}/img/{{$info['imagen_vocacional_url']}}" width="75%" height="315">
                            </div>
                            <div class="col-lg-4 order-3 order-lg-3">
                                <p class="texto">{!! $info['informacion_vocacional_descripcion'] !!}</p>
                                @if($info['descripcion_truncada']==1)
                                    <a class="nombreEncargados" href="{{url('/')}}/verMasInformacionVocacional/{{$info['informacion_vocacional_id']}}">{!!$informacion_vocacional_traduccion[0]['btn_ver_mas']!!}</a>
                                @endif 
                            </div>
                        </div>
                        <br> <br>
                        <br> <br>
                    @endif
                    <!-- Se aumenta el contador cada vez que finaliza para poder intentercalar las posiciones de los div-->
                    @php
                        $contador++;
                    @endphp    
                @endforeach
            </div>
            <div class="col-lg-1 order-3 order-lg-3"> </div>
        </div>
    </div>
</section>