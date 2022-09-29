@extends('plantilla')
<?php
    use App\Http\Controllers\TraduccionController;
    $informacion_vocacional_traduccion=TraduccionController::traduccionInfoVocacional();
?>
@section('content')
	<section class="content">
    	<div class="container-fluid" style="margin-top: 100px;">
      		<div class="row">
      			<h1 class="tituloSeccion" style="text-align:center;">{!! $informacion_vocacional['informacion_vocacional_nombre'] !!}</h1>
				<br> <br>
				<br> <br>
      			<div class="col-lg-1 order-1 order-lg-1"> </div>
            	<div class="col-lg-10 order-2 order-lg-2">

            		<div class="row">
            			<div class="col-lg-1 order-1 order-lg-1"> 
							
						</div>
						<div class="col-lg-10 order-2 order-lg-2">
							<span class="texto">{!! $informacion_vocacional['informacion_vocacional_descripcion'] !!}</span>	
						</div>
						<div class="col-lg-1 order-3 order-lg-3"> 
							
						</div>
					</div>

					
					<br><br>

					<div class="row">
						<div class="col-lg-4 order-1 text-center order-lg-1"> 
							
						</div>
						<div class="col-lg-4 order-2 text-center order-lg-2">
							<a href="{{url('/')}}/descargar/{{ $informacion_vocacional['informacion_vocacional_id'] }}">
                    			<button class="inputBotones">{!!$informacion_vocacional_traduccion[0]['btn_descargar']!!}</button>
                    		</a>
						</div>
						<div class="col-lg-4 order-3 text-center order-lg-3">
							
						</div>
					</div>

		
					<br><br>

					<div class="row">
						<div class="col-lg-4 order-1 text-center order-lg-1"> 
							<img class="center img-fluid" alt="Imagen" src="..\infoVocacional\{{$informacion_vocacional['informacion_vocacional_id']}}\img\{{$informacion_vocacional['imagen_vocacional_url']}}" width="400" height="300">
						</div>
						<div class="col-lg-4 order-2 text-center order-lg-2">
							
						</div>
						<div class="col-lg-4 order-3 text-center order-lg-3">
							<iframe class="embed-responsive-item" width="100%" height="300" src="{{ $informacion_vocacional['video_vocacional_url'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							
						</div>
					</div>


					<br><br>


            	</div>
            	<div class="col-lg-1 order-3 order-lg-3"> </div>
            </div>
        </div>
	</section>
@endsection
