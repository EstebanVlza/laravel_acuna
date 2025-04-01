@extends('layouts.main')
@section('top-title', 'Moviles')

@section('title')
Moviles
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="/">Inicio </a></li>
<li class="breadcrumb-item active">Moviles</li>
@endsection

@section('action')
<a class="btn btn-success" href="{{ route('movil.agregar') }}"><i class="fa fa-plus"></i>Agregar</a>
@endsection

@section('content')

@include('partials.mensajes')

<table class="table table-dark table-striped">
  <thead>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Gama</td>
            <td>Marca</td>
            <td>Precio</td>
            <td>Almacenamiento</td>
            <td>Ram</td>
            <td>Bateria</td>
            <td>Sistema operativo</td>
            <td>Registrado</td>
            <td>Acciones</td>
        </tr>
  </thead>
  <tbody>
        @foreach($moviles as $mobile)
        <tr>
            <td>{{ $mobile->id }}</td>
            <td>{{ $mobile->nombre }}</td>
            <td>{{ $mobile->gama -> nombre}}</td>
            <td>{{ $mobile->marca -> nombre}}</td>
            <td>{{ $mobile->precio }}</td>
            <td>{{ $mobile->almacenamiento }}</td>
            <td>{{ $mobile->ram }}</td>
            <td>{{ $mobile->bateria }}</td>
            <td>{{ $mobile->sistema_op }}</td>
            <td>{{ $mobile->created_at->format('d/M/Y') }}</td>
            <td>
            <a href="{{ route('movil.item', $mobile->id) }}" class="btn btn-sm btn-primary">
						<i class="fa fa-eye"></i>
					  </a>
            <a href="{{ route('movil.modificar', $mobile->id) }}" class="btn btn-sm btn-warning">
						<i class="fa fa-edit"></i>
					  </a>
            <a><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $mobile->id }}">
            <i class="fa fa-remove"></i>
            </button></a>
            </td>
        </tr>
        @endforeach
  </tbody>
</table>
@endsection

@section('modales')
@foreach ($moviles as $mobile)


<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $mobile->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $mobile->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('movil.kranky') }}">
        @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminaer el Registro &copy;?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>El movil <strong>{{ $mobile->nombre}}</strong> con sistema operartivo <strong>{{ $mobile->sistema_op }}</strong>
      sera dado de baja</h4>
        <input type="hidden" name="movil_id" value="{{ $mobile->id }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Aceptar</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection