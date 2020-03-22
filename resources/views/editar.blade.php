@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h3 class="text-center mb-3 pt3">Editar nota</h3>
        <form action="{{route('update', ['id'=>$nota->id])}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{$nota->id}}">
            <div class="form-group">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la nota" value="{{$nota->nombre}}" >

            </div>
            @error('nombre')
                    <div class="alert alert-danger mt-2">
                        El nombre es requerido.
                    </div>
            @enderror
            <div class="form-group">
                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" value="{{$nota->descripcion}}" >
            </div>
            @error('descripcion')
                    <div class="alert alert-danger mt-2">
                        La descripcion es requerida.
                    </div>
            @enderror
            <input type="submit" class="btn btn-success btn-block" value="Actualizar nota">
        </form>
        @if(session('update'))
            <div class="alert alert-success mt-3">
                    {{session('update')}}
            </div>
        @endif
    </div>
</div>

@endsection
