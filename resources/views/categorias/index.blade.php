@extends('layout.layout')
@section('contenido')
    <h1>Listado de categoria</h1>
    <hr>
    <div class="d-md-flex justify-content-md-end">
        <form action="{{ route('categorias.index') }}" method="GET">
            <div class="btn-group">
                <input type="text" name="busqueda" class="form-control">
                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>

        </form>
    </div>

    <div>
        <a href="{{ route('categorias.create') }} "class="btn btn-primary">Agregar</a>
    </div>
    <table class="table">
        <thead>
            <td>ID</td>
            <td>Codigo</td>
            <td>Nombre </td>
            <td>Creado</td>
            <td>Opcion</td>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->codigo }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->created_at }}</td>
                    <td class="btn-group">
                        <a class="btn btn-primary" href="{{ route('categorias.show', $categoria) }}">+</a>
                        <a class="btn btn-warning" href="{{ route('categorias.edit', $categoria) }}">editar</a>
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                        {{-- lo que se hace aqui es abrir show y que abra en el id que se le da click --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" >{{$categorias->appends(['busqueda'=>$busqueda ])}}</td>
            </tr>
        </tfoot>
    </table>
@endsection
