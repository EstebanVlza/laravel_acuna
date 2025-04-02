@extends('layouts.main')

@section('tab-title', 'Moviles')

@section('title')
Moviles
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('movil') }}">Moviles</a></li>
<li class="breadcrumb-item active">Movil</li>
@endsection

@section('content')


<div class="row justify-content-center">
    <div class="col-6" >
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $movil->nombre }}</h5>
                <p class="card-text"><strong>Gama: </strong> {{ $movil->gama->nombre }}</p> 
                <p class="card-text"><strong>Marca: </strong> {{ $movil->marca->nombre }}</p> 
                <p class="card-text"><strong>Precio: </strong> {{ $movil->precio }}</p> 
                <p class="card-text"><strong>almacenamiento: </strong> {{ $movil->almacenamiento }}</p> 
                <p class="card-text"><strong>ram: </strong> {{ $movil->ram }} GB</p> 
                <p class="card-text"><strong>bateria: </strong> {{ $movil->bateria }} </p> 
                <p class="card-text"><strong>sistema operativo: </strong> {{ $movil->sistema_op }}</p> 
                <a href="#" class="card-link">Modificar</a> 
                <a href="#" class="card-link">Eliminar</a>
            </div>
        </div> 
    </div>
</div>

@endsection