@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ml-auto mr-auto">

            <div class="card">
                <div class="card-header">Info de Empleados</div>

                <div class="card-body">

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
                                value="{{$empleado->nombre}}" disabled>
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('nombre')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Apellido:</label>
                                <input type="text" class="form-control" name="apellido" 
                                value="{{$empleado->apellido}}" disabled>
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('apellido')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Correo:</label>
                                <input type="email" class="form-control" name="correo" 
                                value="{{$empleado->correo}}" disabled>
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('correo')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>DNI:</label>
                                <input type="number" class="form-control" name="dni" 
                                value="{{$empleado->dni}}" disabled>
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('dni')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Telefono:</label>
                                <input type="number" class="form-control" name="telefono" 
                                value="{{$empleado->telefono}}" disabled>
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('telefono')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Direccion:</label>
                                <input type="text" class="form-control" name="direccion" 
                                value="{{$empleado->direccion}}" disabled>
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('direccion')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Legajo:</label>
                                <input type="number" class="form-control" name="legajo" 
                                value="{{$empleado->legajo}}" disabled>
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('legajo')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Sector:</label>
                                <input type="text" class="form-control" name="sector" 
                                value="{{$empleado->sector}}" disabled>
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('sector')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Rol Tipo:</label>
                            <select class="form-control" disabled name="roltipo" id="roltipo">
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection