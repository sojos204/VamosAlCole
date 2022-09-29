@php
	$nombreRutaActual = Route::currentRouteName();
    $idiomaActual=session()->get('language');
@endphp
<div class="container-fluid">
    <div class="col-sm-12">
        <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
             
            <a class="navbar-brand" href="{{url('/')}}/">
                <img class="logo" alt="Logo" src="{{url('/')}}/img/logo.png" width="150" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Espacio que genera Distancia entre LOGO y Opción 1 -->
            </div>

            @if ($nombreRutaActual == "index")
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="#inicio" class="inicioMenu">{!!trans('traslate.menu_superior_opcion1') !!}</a></li>
                    
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    
                        <li class="nav-item"><a href="#colegios" class="colegiosMenu">{!!trans('traslate.menu_superior_opcion2') !!}</a></li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    
                        <li class="nav-item"><a href="#infoVocacional" class="vocacionalMenu">{!!trans('traslate.menu_superior_opcion3') !!}</a></li>
                    </ul>
                </div>
            @else
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{url('/')}}">{!!trans('traslate.menu_superior_opcion1') !!}</a></li>
                    
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    
                        <li class="nav-item"><a href="{{url('/listaInstituciones')}}">{!!trans('traslate.menu_superior_opcion2') !!}</a></li>
                    </ul>
                </div>

            @endif

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                
                    <li class="nav-item">
                        <a>

                            {{ Form::open(['route' => 'search', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                            <div class="form-group inputBusqueda">
                                {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => '🔍︎']) }}
                            </div>
                            <div class="form-group ">
                                <button class="submitBusqueda" type="submit" class="btn btn-default">
                                    🔍︎<span class="glyphicon glyphicon-search"></span>
                                </button>
                            
                            </div>
                            {{ Form::close() }}
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--{{trans('traslate.menu_superior_opcion4') }}--> {{ strtoupper($idiomaActual) }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('language','cabecar')}}">{{trans('traslate.menu_superior_opcion4_sub3') }}</a>
                        <a class="dropdown-item" href="{{route('language','es')}}">{{trans('traslate.menu_superior_opcion4_sub1') }}</a>
                        <!-- <a class="dropdown-item" href="{{route('language','en')}}">{{trans('traslate.menu_superior_opcion4_sub2') }}</a> -->
                        
                    </div>
                </div>
            </div> 
        </nav>
    </div>
</div>

@if ($idiomaActual == "cabecar")
	<script>
		const inicio = document.querySelector('.inicioMenu');
        const colegios = document.querySelector('.colegiosMenu');
        const vocacional = document.querySelector('.vocacionalMenu');

		inicio.classList.add('cabecarBar');
        colegios.classList.add('cabecarBar');
        vocacional.classList.add('cabecarBar');
	</script>

@else
    <script>
		const inicio = document.querySelector('.inicioMenu');
        const colegios = document.querySelector('.colegiosMenu');
        const vocacional = document.querySelector('.vocacionalMenu');

		inicio.classList.remove('cabecarBar');
        colegios.classList.remove('cabecarBar');
        vocacional.classList.remove('cabecarBar');
	</script>
@endif