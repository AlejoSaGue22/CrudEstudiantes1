@extends('temas.base')
@section('content')

<div class="container py-5 text-center">
    <h1> Listado de Estudiantes </h1>
    <a href="{{ route('client.create') }}" class= "btn btn-primary">Crear Estudiantes</a>  

    @if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{ Session::get('mensaje')}}
    </div>
    @endif
    
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th> 
        </thead>
    
        <tbody>
            @forelse ($clients as $detail)
            <tr>
                <td>{{$detail->name}}</td>
                <td>{{$detail->apell}}</td>
                <td>{{$detail->edad}}</td>
                <td> 
                    <a href="{{ route('client.edit', $detail)}}" class="btn btn-warning">Editar</a>

                    <form action= "{{ route('client.destroy', $detail)}}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
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


    @if ($clients->count())
    {{$clients->links()}};
    @endif    
    
</div>

@endsection
