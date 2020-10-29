@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ml-auto mr-auto">

            <div class="card">
                <div class="card-header">Alta de Empleados</div>

                <div class="card-body">
                    <div class="row">
                      <a href="{{route('empleados.index')}}"; class="btn btn-info" style="margin-left: 2%;margin-bottom: 2%;">Voler</a>
                    </div>
                    <form id="empleados_store" action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="nombre" 
                                value="{{old('nombre')}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('nombre')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Apellido:</label>
                                <input type="text" class="form-control" name="apellido" 
                                value="{{old('apellido')}}">
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('apellido')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Correo:</label>
                                <input type="email" class="form-control" name="correo" 
                                value="{{old('correo')}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('correo')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>DNI:</label>
                                <input type="number" class="form-control" name="dni" 
                                value="{{old('dni')}}">
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('dni')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Telefono:</label>
                                <input type="number" class="form-control" name="telefono" 
                                value="{{old('telefono')}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('telefono')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Direccion:</label>
                                <input type="text" class="form-control" name="direccion" 
                                value="{{old('direccion')}}">
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('direccion')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Legajo:</label>
                                <input type="number" class="form-control" name="legajo" 
                                value="{{old('legajo')}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('legajo')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Sector:</label>
                                <input type="text" class="form-control" name="sector" 
                                value="{{old('sector')}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('sector')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Rol Tipo:</label>
                            <select class="form-control"  name="roltipo" id="roltipo">
                                <option></option>
                                @foreach($rolTipos as $roltipo)
                                    <option value="{{$roltipo->idRolTipo}}">{{$roltipo->tipo." - ".$roltipo->descripcion}}</option>                        
                                @endforeach
                            </select>
                        </div>
                            <span class="badge badge-danger">{{ $errors->first('roltipo')}}</span>
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

</script>
@endsection