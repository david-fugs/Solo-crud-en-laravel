@extends('layout.layout')
@section('contenido')
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div>
            <label for="">codigo</label><br />
            <input class="form-control" type="text" name="codigo"><br />
        </div>
        <div>
            <label for="">nombre </label><br />
            <input type="text" name="nombre" class="form-control"> <br />
        </div>


        <div>
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </form>
@endsection
