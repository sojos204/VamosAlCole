@extends('plantilla')
@section('content')
<!-- Main content -->
    <section class="content">
        <div class="container-fluid" style="margin-top: 100px;">
            <h1 class="subtituloSeccion" style="text-align:center;"> Resultados de Búsqueda</h1><br>

            <div class="col-md-8">
                <table class="table table-hover table-striped">
                    <tbody>
                        @foreach($resultados as $resultado)
                        <tr>
                            <td><a href="{{url('/')}}/detalleInstitucion/{{ $resultado->tn_id_institucion}}">{{ $resultado->tn_id_institucion }}</a></td>
                            <td><a href="{{url('/')}}/detalleInstitucion/{{ $resultado->tn_id_institucion}}">{{ $resultado->tc_nombre_institucion }}</a></td>
                            <td>{!! $resultado->tc_descripcion_institucion !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>

        </div>
    </section>
<!-- /.content -->
@endsection