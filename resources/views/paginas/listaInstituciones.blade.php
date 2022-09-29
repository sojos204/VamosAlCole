@extends('plantilla')
<?php
  use App\Http\Controllers\TraduccionController;
  $institucion_traduccion=TraduccionController::traduccionInstitucion();
?>
@section('content')
  <!-- Main content -->
    <section class="content">
        <div class="container-fluid" style="margin-top: 100px;">
        
            <h1 class="tituloSeccion" style="text-align:center;">{!!$institucion_traduccion[0]['titulo']!!}</h1>

            <div class="col-1 order-1"> </div>
            <div class="col-10 order-2"> 
            
                <div class="row"  style="margin-top: 50px; margin-bottom: 50px;">

                    <div class="col-lg-3 order-1 order-lg-1" ></div>

                    <div class="col-lg-6 order-2 order-lg-2">
                        
                        <div class="row">
                            
                            <div class="col-6 order-1 order-lg-1" >
                                <select class="selectInstituciones" name="Circuito" id="Circuito" style="margin-top: 28px; height: 48px;" aria-label="">
                                    <option value="-1" selected class="selectInstituciones">Todos</option>
                                    <option value="0" class="selectInstituciones">Otros</option>
                                    @foreach ($listaCircuitos as $circuito)                           
                                        <option value="{{$circuito->tn_id_circuito}}" class="selectInstituciones">{{$circuito->tc_nombre_circuito}} - {{$circuito->DireccionRegional}}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="col-lg-3 order-2 order-lg-1"></div>
                            <div class="col-lg-3 order-3 order-lg-3" ></div>

                        </div>      
                    </div>

                    <div class="col-lg-3 order-3 order-lg-3">
                        <select class="selectInstituciones" name="Rama" id="Rama" style="margin-top: 28px; height: 48px;" aria-label="">
                            @foreach ($listaRamas as $rama)                           
                                <option value="{{$rama->tn_id_rama}}" class="selectInstituciones">{{$rama->tc_nombre_rama}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>

            <br> <br>

            <div class="row" id="DivDinamicoAJAX">
                <!--AQUI VAN LAS FOTOS-->
                @foreach ($listaInstituciones as $colegio)
                    <div class="col-md-3 order-1" style="margin-bottom: 50px">
                        <img class="center rounded mx-auto d-block" alt="Imagen" src="{{url('/')}}/instituciones/{{$colegio->tn_id_institucion}}/{{$colegio->tc_logo_institucion}}" width="200" height="200" >
                        <br>
                        <a href="{{url('/')}}/detalleInstitucion/{{$colegio->tn_id_institucion}}"><p class="nombreColegiosListados" style="text-align:center;">{{$colegio->tc_nombre_institucion}}</p></a>
                    </div>
                @endforeach
            </div>

            <div class="col-1 order-3"> </div>  
        </div>
    </section>
  <!-- /.content -->
  <script src="{{url('/')}}/js/listaInstituciones.js"></script>
@endsection
