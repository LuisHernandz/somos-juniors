@extends('layouts.app')
@section('title', 'Cursos')

@section('body')
    <h1>Cursos</h1>
    <a href="{{route('cursos.create')}}">Crear</a>

    <ul>
        @foreach ($cursos as $curso)
            <li><a href="{{route('cursos.show', $curso->id)}}">{{$curso->nombre}}</a></li>
        @endforeach
    </ul>

    {{$cursos->links()}}

@endsection