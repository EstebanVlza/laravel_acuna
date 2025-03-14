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

{{ $gama }}

@endsection
