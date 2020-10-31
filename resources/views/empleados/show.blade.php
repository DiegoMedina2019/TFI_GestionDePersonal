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
                      <a href="{{route('reporte',$empleado->idempleado)}}"; class="btn btn-dark" style="margin-left: 2%;margin-bottom: 2%;">Generar reporte</a>
                    </div>
            
                    <div>

                        <h1>Empleado</h1>
                        <u><h3 class="text-center">{{$empleado->apellido.', '.$empleado->nombre}}</h3></u>

                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-default">
                            <label>Productividad:</label>
                            <div class="progress">
                            <div class="progress-bar" style="width:{{$empleado->productividad}}%">{{$empleado->productividad}}%</div>
                            </div>
                            </div>
                            
                            <span class="badge badge-danger">{{ $errors->first('nombre')}}</span>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group has-default">
                                <label>Correo:</label>
                                <strong>{{$empleado->correo}}</strong>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group has-default">
                                <label>DNI:</label>
                                <strong>{{$empleado->dni}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group has-default">
                                <label>Telefono:</label>
                                <strong>{{$empleado->telefono}}</strong>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group has-default">
                                <label>Direccion:</label>
                                <strong>{{$empleado->direccion}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group has-default">
                                <label>Sector:</label>
                                <strong>{{$empleado->sector}}</strong>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Rol Tipo:</label>
                                    @foreach($rolTipos as $roltipo)
                                        <strong>
                                            @if ($roltipo->idRolTipo == $empleado->fk_idRolTipo)
                                            @php
                                                $sueldoBase = $roltipo->sueldo;
                                                $sueldo = $sueldoBase + ( ($empleado->insentivo * $sueldoBase )/100 );
                                            @endphp
                                            {{$roltipo->tipo." - ".$roltipo->descripcion}}
                                            @endif                                            
                                        </strong>                        
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group has-default">
                                <label>Insentivo:</label>
                                <strong>{{$empleado->insentivo}}%</strong>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group has-default">
                                <label>Antiguedad:</label>
                                <strong>{{$empleado->antiguedad}} Años</strong>
                                </div>
                            </div>                            
                        </div>
                        <div class="d-flex justify-content-star">
                            <div class="form-group has-default">
                            <label>Sueldo Base:</label>
                            <strong>${{$sueldoBase }}</strong>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="form-group">
                            <h2>Sueldo:<strong>${{$sueldo}}</strong></h2>                            
                            </div>
                        </div>                            
  
                        
                        
                        
                        @foreach ($supervisor as $sup)
                            <hr>
                            <h1>Supervisor</h1>
                            
                            <u><h3 class="text-center">{{$sup->apellido.', '.$sup->nombre}}</h3></u>
                          
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group has-default">
                                <label>Productividad:</label>
                                <div class="progress">
                                <div class="progress-bar" style="width:{{$sup->productividad}}%">{{$sup->productividad}}%</div>
                                </div>
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('nombre')}}</span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group has-default">
                                    <label>Correo:</label>
                                        <strong>{{$sup->correo}}</strong>                                    
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group has-default">
                                    <label>DNI:</label>
                                        <strong>{{$sup->dni}}</strong>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group has-default">
                                    <label>Telefono:</label>
                                        <strong>{{$sup->telefono}}</strong>                                    
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group has-default">
                                    <label>Direccion:</label>
                                        <strong>{{$sup->direccion}}</strong>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">                            
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group has-default">
                                    <label>Sector:</label>
                                        <strong>{{$sup->sector}}</strong>                                    
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Rol Tipo:</label>
                                            @foreach($rolTipos as $roltipo)
                                                <strong>
                                                    @if ($roltipo->idRolTipo == $sup->fk_idRolTipo)
                                                    @php
                                                        $sueldoBase = $roltipo->sueldo;                                                        
                                                        $sueldo = $sueldoBase + ( ($sup->insentivo * $sueldoBase )/100 );
                                                    @endphp
                                                    {{$roltipo->tipo." - ".$roltipo->descripcion}}
                                                    @endif                                            
                                                </strong>                        
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group has-default">
                                    <label>Insentivo:</label>
                                    <strong>{{$sup->insentivo}}%</strong>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group has-default">
                                    <label>Antiguedad:</label>
                                    <strong>{{$sup->antiguedad}} Años</strong>
                                    </div>
                                </div>                            
                            </div>
                            <div class="d-flex justify-content-star">
                                <div class="form-group has-default">
                                <label>Sueldo Base:</label>
                                <strong>${{$sueldoBase }}</strong>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="form-group">
                                <h2>Sueldo:<strong>${{$sueldo}}</strong></h2>                            
                                </div>
                            </div> 

                        @endforeach


                    </div>


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