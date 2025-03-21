@extends('layouts.main')
@section('top-title', 'Gamas -'. (isset($movil) ? 'Modificar' : 'Agregar'))

@section('title')
<h1><i class="fa fa-user"></i>Gamas - {{ isset ($gama) ? 'Modificar' : 'Agregar' }}</h1>
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href={{route('home')}}>Inicio </a></li>
<li class="breadcrumb-item"><a href="{{route('gama')}}">Gamas </a></li>
<li class="breadcrumb-item active">{{ isset ($gama) ? 'Modificar' : 'Agregar' }}</li>
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

                @if(isset($gama))
                <form action="{{ route('gama.update', $gama->id) }}" method="POST">
                <input type="hidden" name="id" value="{{ $gama->id }}">
                @else
                <form action="{{ route('gama.store') }}" method="POST">
                @endif
                    @csrf
                    <label>nombre</label>
                    <input type="text" name="nombre" class="form-control my-2 " 
                    value="{{ old('nombre', default: $gama->nombre ?? '') }}" required>

                    <label>descripcion</label>
                    <input type="text" name="descripcion" class="form-control my-2 " 
                    value="{{ old('descripcion', default: $gama->descripcion ?? '') }}" required>

                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            
            </div>
        </div>
    </div>
</div>

@endsection