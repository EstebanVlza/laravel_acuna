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

<table class="table table-dark table-striped">
  <thead>
        <tr>
            <td>Id</td>
            <td>nombre</td>
            <td>precio</td>
            <td>almacenamiento</td>
            <td>ram</td>
            <td>bateria</td>
            <td>sistema_op</td>
            <td>registrado</td>
            <td>Acciones</td>
        </tr>
  </thead>
  <tbody>
        @foreach($movil as $mobile)
        <tr>
            <td>{{ $mobile->id }}</td>
            <td>{{ $mobile->nombre }}</td>
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
            </td>

        </tr>

        @endforeach
  </tbody>
</table>


<h1>Aquitoy</h1>
@endsection