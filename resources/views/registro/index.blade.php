@extends('layouts.app')

@section('content')

<form action="{{route('registros.index')}}" method="GET">
  @csrf

  <div class="btn-group">
    <input type="text" name="buscar" class="form-control">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>
    <div class="container">
        <table class="table table-dark table-responsive">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Numero identificacion</th>
                <th scope="col">Tipo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
           @foreach ($registro as $registros)
           <tr>
            <th scope="row">{{$registros->id}}</th>
            <td>{{$registros->numero_identificacion}}</td>
            <td>{{$registros->tipo}}</td>
            <td><a href="{{route('registros.edit', $registros)}}" class="btn btn-warning">Editar</a>
              <form action="{{route('registros.destroy', $registros)}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Eliminar</button></td>

              </form>
          </tr>
        
           @endforeach
            
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{$registro->links()}}
          </div>
    </div>

@endsection