@extends('layouts.app')

@section('content')
<div class="container" style="height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-12 ml-auto mr-auto">

            <div class="card">
                <div class="card-header">Listado de Usuarios</div>

                <div class="card-body">

                    <div class="row justify-content-end">
                      <a href="{{route('usuarios.create')}}"; class="btn btn-success pull-right" style="margin-right: 2%;margin-bottom: 2%;">Nuevo usuario</a>
                      {{ Form::model(Request::only(['name']),['route' => 'usuarios.index', 'method' => 'GET', 'class' => 'form-inline float-right','style'=>'margin-right: 2%;margin-bottom: 2%;']) }}
                          <input class="form-control mr-sm-2" type="search" placeholder="Buscar usuarios" aria-label="Buscar" name="name">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                      {{ Form::close() }}
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th colspan="2"> </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($usuarios as $usuario)                                
                                <tr>
                                  <td>
                                    {{$usuario->name}} 
                                  </td>
                                  <td>{{$usuario->email}}</td>
                                  <td>{{$usuario->getRoleNames()[0]}}</td>
                                  <td>
                                    {{-- @can('modificar-usuario') --}}  
                                    <a href="{{route('usuarios.edit',$usuario->id)}}" 
                                        class="editusuario" id="edit_{{ $usuario->id}}"
                                        data-toggle="tooltip" data-placement="right" title="Editar"><i class="far fa-edit fa-2x"></i></a>
                                    {{-- @endcan --}}
                                  </td>
                                  <td>
                                   {{--  @can('eliminar-usuario')      --}}                                 
                                    <a href="javascript:;" data-toggle="tooltip" data-placement="right" title="Eliminar"
                                    onclick="eliminarusuario({{ $usuario->id}});"><i class="fas fa-times fa-2x"></i></a>
                                    <form id="delete-form_{{ $usuario->id}}" action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form> 
                                    {{-- @endcan  --}}                               
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        {{$usuarios->appends(Request::only(['name']))->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
  function eliminarusuario(id){
    if(confirm('Esta acción no podrá deshacerse. ¿Continuar?')){

        document.getElementById('delete-form_'+id).submit();
    }
  }
</script>
@endsection