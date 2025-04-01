@extends('layouts.main')
@section('top-title', 'Marcas')

@section('title')
Marcas
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="/">Inicio</a></li>
<li class="breadcrumb-item active">Marcas</li>
@endsection

@section('action')
<a class="btn btn-success" href="{{ route('marca.agregar') }}"><i class="fa fa-plus"></i>Agregar</a>
@endsection

@section('content')

@include('partials.mensajes')

<table class="table table-dark table-striped">
  <thead>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Registrado</td>
            <td>Acciones</td>
        </tr>
  </thead>
  <tbody>
        @foreach($marcas as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->nombre }}</td>
            <td>{{ $brand->created_at->format('d/M/Y') }}</td>
            <td>
                <a href="{{ route('marca.item', $brand->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('marca.modificar', $brand->id) }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
                <a><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $brand->id }}">
                <i class="fa fa-remove"></i>
                </button></a>
            </td>
        </tr>
        @endforeach
  </tbody>
</table>
@endsection

@section('modales')
@foreach ($marcas as $brand)


<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $brand->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $brand->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('marca.kranky') }}">
        @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminaer el Registro &copy;?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>La Marca <strong>{{ $brand->nombre}}</strong> con fecha de registro <strong>{{ $brand->created_at->format('d/M/Y') }}</strong>
      sera dado de baja</h4>
        <input type="hidden" name="marca_id" value="{{ $brand->id }}">
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