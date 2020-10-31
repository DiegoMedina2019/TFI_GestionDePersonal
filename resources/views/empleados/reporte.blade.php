<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ml-auto mr-auto">
    
                <div class="card">
                    <div class="card-header text-center">Reporte de Empleado</div>
    
                    <div class="card-body">

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
</body>
<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		
		window.onafterprint = function(e){
	        $(window).off('mousemove', window.onafterprint);
	        console.log('Print Dialog Closed..');
	        var redireccion="{{ URL::to('empleados') }}";
            window.location = redireccion;
	    };

	    window.print();
	});
</script>
</html>