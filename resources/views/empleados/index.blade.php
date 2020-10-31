@extends('layouts.app')

@section('content')
<div class="container" style="height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-12 ml-auto mr-auto">

            <div class="card">
                <div class="card-header">Listado de Empleados</div>

                <div class="card-body">

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
                                <th colspan="4"> </th>
{{--                                 <th> </th>
                                <th> </th> --}}
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($empleados as $empleado)                                
                                <tr>
                                  <td>
                                    @if ($empleado->fk_idRolTipo == 1)
                                      <i class="fas fa-user-tie"></i>
                                    @endif
                                    {{$empleado->apellido.", ".$empleado->nombre}} 
                                  </td>
                                  <td>{{$empleado->correo}}</td>
                                  <td>{{$empleado->sector}}</td>
                                  <td>
                                    @can('ver-empleado')
                                    <a href="{{route('empleados.show',$empleado->idempleado)}}" 
                                        class="showEmpleado" id="show_{{ $empleado->idempleado}}"
                                        data-toggle="tooltip" data-placement="right" title="Mostrar"><i class="far fa-eye fa-2x"></i></a>
                                    @endcan
                                  </td>
                                  <td>
                                    @can('modificar-empleado')  
                                    <a href="{{route('empleados.edit',$empleado->idempleado)}}" 
                                        class="editEmpleado" id="edit_{{ $empleado->idempleado}}"
                                        data-toggle="tooltip" data-placement="right" title="Editar"><i class="far fa-edit fa-2x"></i></a>
                                    @endcan
                                  </td>
                                  <td>
                                    @can('eliminar-empleado')                                      
                                    <a href="javascript:;" data-toggle="tooltip" data-placement="right" title="Eliminar"
                                    onclick="eliminarempleado({{ $empleado->idempleado}});"><i class="fas fa-times fa-2x"></i></a>
                                    <form id="delete-form_{{ $empleado->idempleado}}" action="{{ route('empleados.destroy',$empleado->idempleado) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form> 
                                    @endcan                                
                                  </td>
                                  <td>
                                    @can('asignar-supervisor-a-empleado')                                    
                                    <a href="#" class="addSupervisor" id="{{ $empleado->idempleado}}"
                                      data-toggle="tooltip" data-placement="right" title="Asignar Supervisor"><i class="fas fa-user-tie fa-2x"></i></a>
                                    @endcan
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
    <!-- The Modal -->
    <div class="modal" id="ModalAddSupervisor">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Seleccione un supervisor</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form action="{{route('add.supervisor')}}" method="post" id="formAddSuper">
            @csrf
            <!-- Modal body -->
            <div class="modal-body">

              <input type="hidden" name="idempleado" id="idempleado">
              <div class="form-group">
                <label>Supervisor:</label>
                <select class="form-control"  name="idsupervisor" id="idsupervisor">
                    <option></option>
                    @foreach($supervisores as $supervisor)
                        <option value="{{$supervisor->idempleado}}">{{$supervisor->apellido.",".$supervisor->nombre." - ".$supervisor->sector}}</option>                        
                    @endforeach
                </select>
              </div>
                <span class="badge badge-danger">{{ $errors->first('roltipo')}}</span>
              
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="addSupervisor_cerrar">Close</button>
              <button type="submit" class="btn btn-success" id="addSupervisor_aceptar">Aceptar</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>

@endsection

@section('script')
<script>
  $(document).on('click','.addSupervisor',function (e) {
    $('#idempleado').val($(this).prop('id'));

    $('#ModalAddSupervisor').modal('show');
  });
  $(document).on('click','#addSupervisor_cerrar',function () {
    $('#formAddSuper')[0].reset();
    $('#ModalAddSupervisor').modal('hide');
  });
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
  function eliminarempleado(idempleado){
    if(confirm('Esta acción no podrá deshacerse. ¿Continuar?')){

        document.getElementById('delete-form_'+idempleado).submit();
    }
  }
</script>
@endsection