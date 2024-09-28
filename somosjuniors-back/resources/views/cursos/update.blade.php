@extends('layouts.app')
@section('title', 'Cursos - Editar')

@section('body')
    <h1>Cursos - Editar</h1>
    <a href="{{route('cursos.index')}}">Regresar</a>

    <form action="{{ route('cursos.update', $curso) }}" method="POST">
        @csrf
        @method('PUT')

        <br>
        <label for="">
            Nombre:
            <input type="text" name="nombre" value="{{old('nombre', $curso->nombre)}}"><br>
            @error('nombre')
                {{ $message }}
            @enderror
        </label>
        <br>
        <br>
        <label for="">
            Descripción:
            <br>
            <textarea name="descripcion" id="" cols="30" rows="10">{{old('descripcion', $curso->descripcion)}}</textarea>
            <br>
            @error('descripcion')
                {{ $message }}
            @enderror
        </label>

        <br>
        <input type="submit" value="Enviar">
    </form>
@endsection