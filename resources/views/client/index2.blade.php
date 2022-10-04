@extends('temas.base')
@section('content')

<div class="container py-5 text-center">
    <h1> Listado de Profesores </h1>
    <a href="{{ route('Teacher.create') }}" class= "btn btn-primary">Crear Profesor</a>  

    @if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{ Session::get('mensaje')}}
    </div>
    @endif
    
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th> 
            <th>Celular</th> 
        </thead>
    
        <tbody>
            @forelse ($teachers as $detail)
            <tr>
                <td>{{$detail->nameTeac}}</td>
                <td>{{$detail->surnameTeac}}</td>
                <td>{{$detail->emailTeac}}</td>
                <td>{{$detail->cellTeac}}</td>
                <td> 
                    <a href="{{ route('Teacher.edit', $detail)}}" class="btn btn-warning">Editar</a>

                    <form action= "{{ route('Teacher.destroy',$detail)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm ('¿Deseas Eliminar el dato?')">Eliminar</button>
                    </form>
                </td>
            </tr>
                
            @empty
                <tr>
                    <td colspan="3">No hay Registro</td>
                </tr>
            @endforelse
           
        </tbody>
    
    </table>


    @if ($teachers->count())
    {{$teachers->links()}};
    @endif    
    
</div>

@endsection
