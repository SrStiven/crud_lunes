@extends('layouts.app')
@section('content')
<div class="mx-auto" style="width:200px">
<h2 >Crear Libros</h2>
</div>

    <div class="container p-3 my-3 bg-primary text-white">
        <form action="{{ route('book.create') }}"   method="POST">
            @csrf
            <div class="form-group">
                <label> Nombre del autor</label>
                <input type="text" name="name"  class="form-control" required>
            </div>
            <div class="form-group">
                <label> Titulo del libro</label>
                <input type="text" name="title" required  class="form-control">
            </div>
            <div class="form-group">
                <label> Año de publicacion</label>
                <input type="number" name="age" min="0" required  class="form-control">
            </div>
            <div class="form-group">
                <label>Cantidad de libros</label>
                <input type="number" name="count" min="0" required  class="form-control">
            </div>
            <div class="form-group" >
                <label>Genero del libro</label>
                <select class="form-control" name="gender">
                    <option value="">Seleccionar</option>
                    <option value="accion">Accion</option>
                    <option value="comedia">Comedia</option>
                    <option value="ficcion">Ficcion</option>
                </select>
            </div>
            <div class="form-group">
                <label> Fecha de vencimiento del libro</label>
                <input type="date" name="due_date" required  class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
        
    </div>
   <hr>
    <form action="{{ route('book.destroy') }}" method="POST" onsubmit="return confirm('Estas seguro?');">
        @csrf
        <label>Eliminar todos los libros</label>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    <hr>
    <h2>Export/Import</h2>
    <div>
        <label>Export excel</label>
        <a href="{{ route('book.export') }}">Exportar</a>
    </div>
    <hr>
    <form action="{{ route('book.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Importar excel</label>
            <input type="file" name="file">
            <button type="submit">Enviar</button>
        </div>
    </form>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Titulo</th>
                <th>Año</th>
                <th>Cantidad</th>
                <th>Genero</th>
                <th>Fecha de Vencimiento</th>
                <th>Accion</th>
                <th>Accion</th>
            </tr>
        </thead>
        @foreach ($books as $book)
            <tbody>
                <tr style="{{ $book->active ? '' : 'background-color:red;' }}">
                    <th>{{$book->name}}</th>
                    <th>{{$book->title}}</th>
                    <th>{{$book->age}}</th>
                    <th>{{$book->count}}</th>
                    <th>{{$book->gender}}</th>
                    <th>{{$book ->due_date}}</th>
                    <th><a href="{{ route('book.edit', $book->id) }}">Editar</a></th>
                    <th><a href="{{ route('book.delete', $book->id) }}">Eliminar</a></th>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
