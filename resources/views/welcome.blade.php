@extends('temas.base')
@section('content')

<div class="container py-5 text-center">
    <h1>  VINCULACION </h1>
    <a href="{{ route('client.index') }}" class= "btn btn-primary">LISTA DE ESTUDIANTES</a>
    <a href="{{ route('client.create') }}" class= "btn btn-primary">AGREGAR ESTUDIANTES</a> 

  
    <a href="{{ route('Teacher.create') }}" class= "btn btn-primary">AGREGAR PROFESORES</a> 
    <a href="{{ route('Teacher.index') }}" class= "btn btn-primary">LISTA DE ESTUDIANTES</a>


      
</div>

@endsection
