@extends('layouts.main')
@section('top-title', 'Gamas')

@section('title')
Gamas
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="/">Inicio</a></li>
<li class="breadcrumb-item active">Gamas</li>
@endsection
@section('action')
<a class="btn btn-success" href="{{ route('gama.agregar') }}"><i class="fa fa-plus"></i>Agregar</a>
@endsection

@section('content')

<table class="table table-dark table-striped">
  <thead>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Registrado</td>
            <td>Acciones</td>
        </tr>
  </thead>
  <tbody>
        @foreach($gama as $lineup) <!-- Cambio de $gama a $gamas -->
        <tr>
            <td>{{ $lineup->id }}</td>
            <td>{{ $lineup->nombre }}</td>
            <td>{{ $lineup->descripcion }}</td> <!-- Corregido: antes decía precio -->
            <td>{{ $lineup->created_at->format('d/M/Y') }}</td>
            <td>
                <a href="{{ route('gama.item', $lineup->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('gama.modificar', $lineup->id) }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
  </tbody>
</table>

<h1>Aquitoy</h1>

@endsection
