@extends('layouts.app')
@section('title', 'Cursos')

@section('body')
    <h1>Curso {{$curso->nombre}}</h1>

    <a href="{{route('cursos.index')}}">Regresar</a> <br>
    <a href="{{route('cursos.edit', $curso->id)}}">Editar</a>

    <p>
        <strong>Descripción:</strong>
        <i>{{$curso->descripcion}}</i>
    </p>

    <form action="{{ route('cursos.destroy', $curso)}}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Eliminar">
    </form>
@endsection