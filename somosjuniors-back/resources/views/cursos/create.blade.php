@extends('layouts.app')
@section('title', 'Cursos - Crear')

@section('body')
    <h1>Cursos - Crear</h1>
    <a href="{{route('cursos.index')}}">Regresar</a>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <br>
        <label for="">
            Nombre:
            <input type="text" name="nombre" value="{{old('nombre')}}">
            <br>
            @error('nombre')
                {{ $message }}
            @enderror
        </label>
        <br>
        <br>
        <label for="">
            Descripción:
            <br>
            <textarea name="descripcion" id="" cols="30" rows="10">{{old('descripcion')}}</textarea>
            <br>
            @error('descripcion')
                {{ $message }}
            @enderror
        </label>

        <br><br>
        <input type="submit" value="Enviar">
    </form>
@endsection