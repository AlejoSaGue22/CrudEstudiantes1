@extends('temas.base')
@section('content')

<div class="container py-5 text-center">
    <h1> CRUD ACADEMICO </h1>
    @if (isset($client))
        <h1>Editar Datos</h1>
    @else
        <h1>Crear Estudiante</h1>
    @endif

    @if (isset($client))
    <form action =" {{ route('client.update') }}" method="POST">
        @method('PUT')

    @else
    <form action =" {{ route('client.store') }}" method="POST">

    @endif
   
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">ESTUDIANTE</label>
        <input type="text" name="name" class="form-control" placeholder="Nombre del Estudiante" 
        value="{{ old('name') ?? @$client->name}}">
        <p class="form-text"> Escriba el nombre del Estudiante </p>
        @error('name')
        <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>
   

 
    <div class="mb-3">
        <label for="apell" class="form-label">Apellido</label>
        <input type="text" name="apell" class="form-control" placeholder="Apellido" 
        value="{{ old('apell') ?? @$client->apell}}">
        <p class="form-text"> Escriba el Apellido </p>
        @error('due')
        <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>
   

    <div class="mb-3">
        <label for="edad" class="form-label">Edad</label>
        <input type="number" name="edad" class="form-control" placeholder="Edad"
        value="{{ old('edad') ?? @$client->edad}}">
        <p class="form-text"> Escriba su Edad </p>
        @error('coments')
        <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>

    @if(isset($client))
    <button type="submit" class="btn btn-primary"> Editar </button>
   
    @else
    <button type="submit" class="btn btn-primary"> Crear </button>
  
   @endif


</form>

</div>

@endsection