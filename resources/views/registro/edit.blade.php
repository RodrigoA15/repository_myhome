@extends('layouts.app')

@section('content')
<form action="{{route('registros.update', $registro)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label  class="form-label">Email address</label>
      <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion" value="{{$registro->numero_identificacion}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="number" class="form-control" id="tipo" name="tipo" value="{{$registro->tipo}}">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection