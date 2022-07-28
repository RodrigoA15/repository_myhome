@extends('layouts.app')

@section('content')
<form action="{{route('registros.store')}}" method="POST">
    @csrf

    <div class="mb-3">
      <label  class="form-label">Email address</label>
      <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="number" class="form-control" id="tipo" name="tipo">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection