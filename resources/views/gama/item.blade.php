@extends('layouts.main')

@section('tab-title', 'Gamas')

@section('title')
Gamas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('gama') }}">Gamas</a></li>
<li class="breadcrumb-item active">Gama</li>
@endsection

@section('content')



<div class="row justify-content-center">
    <div class="col-6" >
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $gama->nombre }}</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text"><strong>Descripción:</strong> {{ $gama->descripcion }}</p> 
                <a href="#" class="card-link">Modificar</a> 
                <a href="#" class="card-link">Eliminar</a>
            </div>
        </div> 
    </div>
</div>

@endsection
