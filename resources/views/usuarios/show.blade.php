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

                        <h1>Empleado</h1>

                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Nombre:</label>
                                <strong>{{$empleado->nombre}}</strong>
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('nombre')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Apellido:</label>
                                <strong>{{$empleado->apellido}}</strong>
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('apellido')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Correo:</label>
                                <strong>{{$empleado->correo}}</strong>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>DNI:</label>
                                <strong>{{$empleado->dni}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Telefono:</label>
                                <strong>{{$empleado->telefono}}</strong>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Direccion:</label>
                                <strong>{{$empleado->direccion}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Sector:</label>
                                <strong>{{$empleado->sector}}</strong>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group">
                                    <label>Rol Tipo:</label>
                                    @foreach($rolTipos as $roltipo)
                                        <strong>
                                            @if ($roltipo->idRolTipo == $empleado->fk_idRolTipo)
                                            {{$roltipo->tipo." - ".$roltipo->descripcion}}
                                            @endif                                            
                                        </strong>                        
                                    @endforeach
                                </div>
                            </div>
                        </div>    
                        
                        <hr>
                        <h1>Supervisor</h1>

                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Nombre:</label>
                                @if (isset($supervisor[0]->nombre))
                                    <strong>{{$supervisor[0]->nombre}}</strong>                                    
                                @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Apellido:</label>
                                @if (isset($supervisor[0]->apellido))
                                    <strong>{{$supervisor[0]->apellido}}</strong>                                    
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Correo:</label>
                                @if (isset($supervisor[0]->correo))
                                    <strong>{{$supervisor[0]->correo}}</strong>                                    
                                @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>DNI:</label>
                                @if (isset($supervisor[0]->dni))
                                    <strong>{{$supervisor[0]->dni}}</strong>                                    
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Telefono:</label>
                                @if (isset($supervisor[0]->telefono))
                                    <strong>{{$supervisor[0]->telefono}}</strong>                                    
                                @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Direccion:</label>
                                @if (isset($supervisor[0]->direccion))
                                    <strong>{{$supervisor[0]->direccion}}</strong>                                    
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Sector:</label>
                                @if (isset($supervisor[0]->sector))
                                    <strong>{{$supervisor[0]->sector}}</strong>                                    
                                @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group">
                                    <label>Rol Tipo:</label>
                                    @if (isset($supervisor[0]->fk_idRolTipo))                                  
                                        @foreach($rolTipos as $roltipo)
                                            <strong>
                                                @if ($roltipo->idRolTipo == $supervisor[0]->fk_idRolTipo)
                                                {{$roltipo->tipo." - ".$roltipo->descripcion}}
                                                @endif                                            
                                            </strong>                        
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div> 

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