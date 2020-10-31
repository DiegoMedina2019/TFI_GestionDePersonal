@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ml-auto mr-auto">

            <div class="card">
                <div class="card-header">Edicion de empleados</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                      <a href="{{route('empleados.index')}}"; class="btn btn-info" style="margin-left: 2%;margin-bottom: 2%;">Voler</a>
                    </div>
                    <form id="empleados_store" action="{{ route('empleados.update',$empleado->idempleado) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="nombre" 
                                value="{{$empleado->nombre}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('nombre')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Apellido:</label>
                                <input type="text" class="form-control" name="apellido" 
                                value="{{$empleado->apellido}}">
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('apellido')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Correo:</label>
                                <input type="email" class="form-control" name="correo" 
                                value="{{$empleado->correo}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('correo')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>DNI:</label>
                                <input type="number" class="form-control" name="dni" 
                                value="{{$empleado->dni}}">
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('dni')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Telefono:</label>
                                <input type="number" class="form-control" name="telefono" 
                                value="{{$empleado->telefono}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('telefono')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Direccion:</label>
                                <input type="text" class="form-control" name="direccion" 
                                value="{{$empleado->direccion}}">
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('direccion')}}</span>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Sector:</label>
                                <input type="text" class="form-control" name="sector" 
                                value="{{$empleado->sector}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('sector')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group">
                                    <label>Rol Tipo:</label>
                                    <select class="form-control"  name="roltipo" id="roltipo">
                                        <option></option>
                                        @foreach($rolTipos as $roltipo)
                                            <option value="{{$roltipo->idRolTipo}}"
                                                @if ($roltipo->idRolTipo == $empleado->fk_idRolTipo)
                                                    {{'selected'}}
                                                @endif >{{$roltipo->tipo." - ".$roltipo->descripcion}}</option>                        
                                        @endforeach
                                    </select>
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('roltipo')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Productividad: <strong id="rangeValor">0</strong></label>
                                <input type="range" class="custom-range" name="productividad"
                                id="productividad" 
                                min="0" max="100"
                                value="{{$empleado->productividad}}">                                
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('productividad')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Antiguedad:</label>
                                <input type="number" class="form-control" name="antiguedad" 
                                value="{{$empleado->antiguedad}}">
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('antiguedad')}}</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$('#productividad').on('change mousemove',function (e) {
    $('#rangeValor').html($(this).val())
});
$(document).ready(function (e) {
    $('#rangeValor').html('{{$empleado->productividad}}')
});
</script>
@endsection