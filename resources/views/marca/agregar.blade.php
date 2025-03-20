@extends('layouts.main')
@section('top-title', 'Marcas - Agregar')

@section('title')
<i class="fa fa-user"></i>Moviles
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href={{route('home')}}>Inicio </a></li>
<li class="breadcrumb-item"><a href={{route('marca')}}>Inicio </a></li>
<li class="breadcrumb-item active">Agregar</li>
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
                <form action="{{ route('marca.store') }}" method="POST">
                    @csrf
                    <label>nombre</label>
                    <input type="text" name="nombre" class="form-control my-2 " 
                    value="{{ old('nombre', $marca->nombre ?? '') }}" required>
                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            
            </div>
        </div>
    </div>
</div>
@endsection