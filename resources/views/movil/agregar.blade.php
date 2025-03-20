@extends('layouts.main')
@section('top-title', 'Moviles - ' . (isset($movil) ? 'Modificar' : 'Agregar'))

@section('title')
<h1><i class="fas fa-mobile-alt"></i> Móviles - {{ isset ($movil) ? 'Modificar' : 'Agregar' }}</h1>
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href={{route('home')}}>Inicio </a></li>
<li class="breadcrumb-item"><a href={{route('movil')}}>Móviles </a></li>
<li class="breadcrumb-item active">{{ isset ($movil) ? 'Modificar' : 'Agregar' }} </li>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
    @if($errors->any()) 
			<div class="card text-bg-danger mb-3">
			  <div class="card-header">Advertencia</div>
			  <div class="card-body">
			    <h5 class="card-title">Se encontraron los siguientes errores:</h5>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
			  </div>
			</div>
		@endif
        <div class="card">
      
            <div class="card-body">
                
                        @if(isset($movil))
                        <form action="{{ route('movil.update', $movil->id) }}" method="POST">
                            <input type="hidden" name="id" value="{{ $movil->id }}">
                        @else
                        <form action="{{ route('movil.store') }}" method="POST">
                        @endif
                        @csrf
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control my-2"  
                        value="{{ old('nombre', $movil->nombre ?? '') }}" required>

                        <label for="gama_id">Gama</label>
                        <input type="text" id="gama_id" name="gama_id" class="form-control my-2"  
                        value="{{ old('gama_id', $movil->gama_id ?? '') }}" required>

                        <label for="marca_id">Marca</label>
                        <input type="text" id="marca_id" name="marca_id" class="form-control my-2"  
                        value="{{ old('marca_id', $movil->marca_id ?? '') }}" required>

                        <label for="precio">Precio</label>
                        <input type="text" id="precio" name="precio" class="form-control my-2"  
                        value="{{ old('precio', $movil->precio ?? '') }}" required>

                        <label for="almacenamiento">Almacenamiento</label>
                        <input type="text" id="almacenamiento" name="almacenamiento" class="form-control my-2"  
                        value="{{ old('almacenamiento', $movil->almacenamiento ?? '') }}" required>

                        <label for="ram">Ram</label>
                        <input type="text" id="ram" name="ram" class="form-control my-2"  
                        value="{{ old('ram', $movil->ram ?? '') }}" required>

                        <label for="bateria">Batería</label>
                        <input type="text" id="bateria" name="bateria" class="form-control my-2"  
                        value="{{ old('bateria', $movil->bateria ?? '') }}" required>

                        <label for="sistema_op">Sistema operativo</label>
                        <input type="text" id="sistema_op" name="sistema_op" class="form-control my-2"  
                        value="{{ old('sistema_op', $movil->sistema_op ?? '') }}" required>

                        <button class="btn btn-success mt-2">{{ isset($movil) ? 'Actualizar' : 'Guardar' }}</button>
                    </form>

            
            </div>
        </div>
    </div>
</div>


@endsection