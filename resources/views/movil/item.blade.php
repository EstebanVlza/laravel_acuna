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

{{ $movil }}

@endsection