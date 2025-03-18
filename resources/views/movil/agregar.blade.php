@extends('layouts.main')
@section('top-title', 'Moviles - Agregar')

@section('title')
<h1><i class="fas fa-mobile-alt"></i> Móviles</h1>
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href={{route('home')}}>Inicio </a></li>
<li class="breadcrumb-item"><a href={{route('movil')}}>Moviles </a></li>
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
                <form action="{{ route('movil.store') }}" method="POST">
                    @csrf
                    <label>nombre</label>
                    <input type="text" name="nombre" class="form-control my-2"  value="{{ $movil->nombre }}" required>
                    <label>precio</label>
                    <input type="text" name="precio" class="form-control my-2 "  value="{{ $movil->precio }}"required>
                    <label>almacenamiento</label>
                    <input type="text" name="almacenamiento" class="form-control my-2 " value="{{ $movil->almacenamiento }}" required>
                    <label>ram</label>
                    <input type="text" name="ram" class="form-control my-2 "  value="{{ $movil->ram }}" required>
                    <label>bateria</label>
                    <input type="text" name="bateria" class="form-control my-2 "  value="{{ $movil->bateria }}"required>
                    <label>sistema operativo</label>
                    <input type="text" name="sistema_op" class="form-control my-2 "value="{{ $movil->sistema_op }}"required>
                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            
            </div>
        </div>
    </div>
</div>


@endsection