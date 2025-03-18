@extends('layouts.main')

@section('top-title', 'Marcas')

@section('title')
Marcas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="/">Inicio</a>
</li>
<li class="breadcrumb-item active">Marcas</li>
@endsection
@section('action')
<a class="btn btn-success" href="{{ route('marca.agregar') }}"><i class="fa fa-plus"></i>Agregar</a>
@endsection

@section('content')

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
            </td>
        </tr>
        @endforeach
  </tbody>
</table>

<h1>Aquitoy</h1>

@endsection
