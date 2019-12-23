@extends('layouts.dashboard')
@section('adminContent')
<h1>Panel de administrador</h1>
<h2>Administrador: {{auth()->user()->name}} </h2>

@endsection