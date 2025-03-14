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

{{ $marca }}

@endsection
