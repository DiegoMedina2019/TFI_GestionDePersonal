@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ml-auto mr-auto">

            <div class="card">
                <div class="card-header">Listado de Empleados</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <div class="row justify-content-end">
                      <a href="{{route('empleados.create')}}"; class="btn btn-success pull-right" style="margin-right: 2%;margin-bottom: 2%;">Nuevo Empleado</a>
                      {{ Form::model(Request::only(['palabra']),['route' => 'empleados.index', 'method' => 'GET', 'class' => 'form-inline float-right','style'=>'margin-right: 2%;margin-bottom: 2%;']) }}
                          <input class="form-control mr-sm-2" type="search" placeholder="Buscar empleados" aria-label="Buscar" name="palabra">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                      {{ Form::close() }}
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th>Nombre y Apellido</th>
                                <th>Correo</th>
                                <th>Sector</th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($empleados as $empleado)                                
                                <tr>
                                  <td>{{$empleado->apellido.", ".$empleado->nombre}}</td>
                                  <td>{{$empleado->correo}}</td>
                                  <td>{{$empleado->sector}}</td>
                                  <td>
                                    <a href="{{route('empleados.show',$empleado->idempleado)}}" class="showEmpleado" id="show_{{ $empleado->idempleado}}"><i class="far fa-eye fa-2x"></i></a>
                                  </td>
                                  <td>
                                    <a href="{{route('empleados.edit',$empleado->idempleado)}}" class="editEmpleado" id="edit_{{ $empleado->idempleado}}"><i class="far fa-edit fa-2x"></i></a>
                                  </td>
                                  <td>                                    
                                    <a href="javascript:;"
                                    onclick="eliminarempleado({{ $empleado->idempleado}});"><i class="fas fa-times fa-2x"></i></a>
                                    <form id="delete-form_{{ $empleado->idempleado}}" action="{{ route('empleados.destroy',$empleado->idempleado) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form> 
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        {{$empleados->appends(Request::only(['palabra']))->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
  function eliminarempleado(idempleado){
    if(confirm('Esta acción no podrá deshacerse. ¿Continuar?')){

        document.getElementById('delete-form_'+idempleado).submit();
    }
  }
</script>
@endsection