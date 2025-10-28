@extends('layouts.app')
@section('content')
<div class="mx-auto" style="width:200px">
<h2 >Editar Libros</h2>
</div>
    <form action="{{ route('book.update') }}"   method="POST">
        @csrf
        <input type="hidden" hidden="id" name="id" value="{{ $book->id }}">
        <div class="form-group">
            <label> Nombre del autor</label>
            <input class="form-control" type="text" name="name" required value="{{ $book->name }}">
        </div>
        <div class="form-group">
            <label> Titulo del libro</label>
            <input  class="form-control" type="text" name="title" value="{{ $book->title }}">
        </div>
        <div class="form-group">
            <label> Año de publicacion</label>
            <input class="form-control" type="number" name="age" min="0" required value="{{ $book->age }}">
        </div>
        <div class="form-group">
            <label>Cantidad de libros</label>
            <input class="form-control" type="number" name="count" min="0" required value="{{ $book->count }}">
        </div>
        <div class="form-group">
            <label>Genero del libro</label>
            <select name="gender" class="form-control">
                <option value="">Seleccionar</option>
                <option value="accion" {{ $book->gender == 'accion' ? 'selected' : '' }}>Accion</option>
                <option value="comedia" {{ $book->gender == 'comedia' ? 'selected' : '' }}>Comedia</option>
                <option value="ficcion" {{ $book->gender == 'ficcion' ? 'selected' : '' }}>Ficcion</option>
            </select>
        </div>
        <br>
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
@endsection
