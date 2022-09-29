@extends('plantilla')
@section('content')
  <!-- Main content -->
  <section class="content" id="inicio">

    <div class="container-fluid"  style="margin-top: 50px;">

      <div class="row" >

        <div class="col-lg-1 order-1 order-lg-1" > </div>

        <div class="col-lg-10 order-2 order-lg-2">

          <div class="row" style="margin-top: 96px;">

            <div class="col-lg-6 order-1 order-lg-1" >
              <iframe width="100%" height="370" src= "{{trans('traslate.vista_home_video')}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="col-lg-1 order-2 order-lg-2"></div>

            <div class="col-lg-5 order-3 order-lg-3">

              <div class="col-12">
                  <h1 class="tituloSeccion"> {!!trans('traslate.vista_home_titulo') !!} </h1>
              </div>
              <br>

              <div class="col-12">
                  <p class="texto">{!!trans('traslate.vista_home_descripcion')!!} </p>
              </div>
              <br>
              <div class="col-12">
                <div class="row">

                  <div class="col-lg-4 order-1 order-lg-1" > </div>

                  <div class="col-lg-8 order-2 order-lg-2">
                      <a class="btn inputBotones" href="{{url('/')}}/listaInstituciones" role="button">{!!trans('traslate.vista_home_button')!!}</a>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
          
        </div>

        <div class="col-lg-1 order-4 order-lg-4"></div>
 
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<br> <br>
<br> <br>
@include('paginas.colegios')
<br> <br>
<br> <br>
@include('paginas.infoVocacional')
<br> <br>
<br> <br>
@endsection