@extends('layouts.main')

@section('tab-title', 'Marcas')

@section('title')
Marcas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('marca') }}">Marcas</a></li>
<li class="breadcrumb-item active">Marca</li>
@endsection

@section('content')



<div class="row justify-content-center">
    <div class="col-6" >
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $marca->nombre }}</h5>
                <p class="card-text"><strong>Registrado: </strong> {{ $marca->created_at }}</p> 
                <a href="#" class="card-link">Modificar</a> 
                <a href="#" class="card-link">Eliminar</a>
            </div>
        </div> 
    </div>
</div>

@endsection
