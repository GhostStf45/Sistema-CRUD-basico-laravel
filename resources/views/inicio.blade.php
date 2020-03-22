@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--Lista notas-->
        <div class="col-md-7">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                    
                </thead>
                <tbody>
                    
                    @foreach($notas as $nota)
                    <tr>
                            <td>{{$nota->id}}</td>
                            <td>{{$nota->nombre}}</td>
                            <td>{{$nota->descripcion}}</td>
                            <td>
                                <div class="d-flex justify-content-around ">
                                    <a href="{{route('edit', ['id'=>$nota->id])}}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{route('delete', ['id'=>$nota->id])}}" class="btn btn-sm btn-danger">Borrar</a>
                                </div>
                                
                            </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            @if(session('delete'))
                <div class="alert alert-danger mt-3">
                    {{session('delete')}}
                </div>
            @endif
            <div id="pagination" class="mt-3 d-flex justify-content-md-center">{{$notas->links()}}</div>
        </div>
        
        <!--****************Agregar notas****************-->
        <div class="col-md-5">
                <h3 class="text-center mb-4">Agregar notas</h3>
            
            <form action="{{route('store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la nota" value="{{old('nombre')}}" >
                    
                </div>
                @error('nombre')
                    <div class="alert alert-danger mt-2">
                        El nombre es requerido.
                    </div>
                @enderror
                <div class="form-group">
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" value="{{old('descripcion')}}" >
                </div>
                @error('descripcion')
                    <div class="alert alert-danger mt-2">
                        La descripcion es requerida.
                    </div>
                @enderror
                <input type="submit" class="btn btn-success btn-block" value="Enviar nota">
            </form>
            
            @if(session('agregar'))
                <div class="alert alert-success mt-3">
                    {{session('agregar')}}
                </div>
            @endif
        </div>
        <!--**************************-->
    </div>
</div>
@endsection