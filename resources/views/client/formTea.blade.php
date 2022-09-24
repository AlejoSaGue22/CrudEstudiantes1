@extends('temas.base')
@section('content')

<div class="container py-5 text-center">
    <h1> CRUD ACADEMICO </h1>
    @if (isset($teacher))
        <h1>Editar Datos</h1>
    @else
        <h1>Crear Profesor</h1>
    @endif

    @if (isset($teacher))
    <form action =" {{ route('Teacher.update') }}" method="POST">
        @method('PUT')

    @else
    <form action =" {{ route('Teacher.store') }}" method="POST">

    @endif
   
    @csrf
    <div class="mb-3">
        <label for="nameTeac" class="form-label">PROFESOR</label>
        <input type="text" name="nameTeac" class="form-control" placeholder="Nombre del Profesor" 
        value="{{ old('nameTeac') ?? @$teacher->name}}">
        <p class="form-text"> Escriba el nombre del Profesor</p>
        @error('nameTeac')
        <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>
   

 
    <div class="mb-3">
        <label for="surnameTeac" class="form-label">APELLIDO</label>
        <input type="text" name="surnameTeac" class="form-control" placeholder="Apellido" 
        value="{{ old('surnameTeac') ?? @$teacher->surnameTeac}}">
        <p class="form-text"> Escriba el Apellido </p>
        @error('surnameTeac')
        <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>
   

    <div class="mb-3">
        <label for="emailTeac" class="form-label">EMAIL</label>
        <input type="text" name="emailTeac" class="form-control" placeholder="example@mail.com"
        value="{{ old('emailTeac') ?? @$teacher->emailTeac}}">
        <p class="form-text"> Escriba su EMAIL </p>
        @error('emailTeac')
        <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cellTeac" class="form-label">CELULAR</label>
        <input type="text" name="cellTeac" class="form-control" placeholder="Celular"
        value="{{ old('cellTeac') ?? @$teacher->cellTeac}}">
        <p class="form-text"> Escriba su Celular</p>
        @error('cellTeac')
        <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>

    @if(isset($teacher))
    <button type="submit" class="btn btn-primary"> Editar </button>
   
    @else
    <button type="submit" class="btn btn-primary"> Crear </button>
  
   @endif


</form>

</div>

@endsection