@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Editar Acertijo</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('acertijo/')}}" class="btn btn-sm btn-default">
            Cancelar y Volver</a>
        </div>
        </div>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach                
                </ul>
            </div>
        @endif
        <form action="{{url('acertijo/'.$acertijo->i_id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <h4 for="pregunta">Pregunta</h4>
                <input type="text" name="t_pregunta" class="form-control" value="{{old('t_pregunta',$acertijo->t_pregunta)}}" required style="width:100%"> 
            </div>
            <div class="form-group">
                <h4 for="respuesta">Respuesta </h4>
                <input type="text" name="t_respuesta" class="form-control" value="{{old('t_respuesta',$acertijo->t_respuesta)}}" required>
            </div>
            <div class="form-group">
                <h4 for="respuesta">Pistas </h4>
                <input type="text" name="t_pista" class="form-control" value="{{old('t_pista',$acertijo->t_pista)}}" required>
            </div>
            <div class="form-group">
                <h4 for="respuesta">KeyWord N°1 </h4>
                <input type="text" name="t_kword1" class="form-control" value="{{old('t_kword1',$acertijo->t_kword1)}}" required>
            </div>
            <div class="form-group">
                <h4 for="respuesta">Key Word N°2 </h4>
                <input type="text" name="t_kword2" class="form-control" value="{{old('t_kword2',$acertijo->t_kword2)}}" required>
            </div>
            <div class="form-group">
                <h4 for="respuesta">Key Word N°3 </h4>
                <input type="text" name="t_kword3" class="form-control" value="{{old('t_kword3',$acertijo->t_kword3)}}" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection