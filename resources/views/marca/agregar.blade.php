@extends('layouts.main')
@section('top-title', 'Marcas -' . (isset($marca) ? 'Modificar' : 'Agregar'))

@section('title')
<h1><i class="fa fa-user"></i>Marcas - {{ isset ($marca) ? 'Modificar' : 'Agregar' }}</h1>
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href={{route('home')}}>Inicio </a></li>
<li class="breadcrumb-item"><a href={{route('marca')}}>Inicio </a></li>
<li class="breadcrumb-item active">{{ isset ($marca) ? 'Modificar' : 'Agregar' }} </li>
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
                @if(isset($marca))
                <form action="{{ route('marca.update', $marca->id) }}" method="POST">
                    <input type="hidden" name="id" value="{{ $marca->id }}">
                @else
                <form action="{{ route('marca.store') }}" method="POST">
                @endif
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