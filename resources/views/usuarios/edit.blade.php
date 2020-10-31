@extends('layouts.app')

@section('content')
<div class="container" style="height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-12 ml-auto mr-auto">

            <div class="card">
                <div class="card-header">Edicion de usuarios</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                      <a href="{{route('usuarios.index')}}"; class="btn btn-info" style="margin-left: 2%;margin-bottom: 2%;">Voler</a>
                    </div>
                    <form id="usuarios_store" action="{{ route('usuarios.update',$u->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" 
                                value="{{$u->name}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('name')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>Correo:</label>
                                <input type="email" class="form-control" name="email" 
                                value="{{$u->email}}">
                                </div>
                                
                                <span class="badge badge-danger">{{ $errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group has-default">
                                <label>password:</label>
                                <input type="password" class="form-control" name="password">
                                </div>
                                <span class="badge badge-danger">{{ $errors->first('password')}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="form-group">
                                    <label>Rol y Permisos :</label>
                                    <select class="form-control"  name="rol" id="rol">
                                        <option></option>
                                        @foreach($roles as $rol)
                                            <option value="{{$rol}}"
                                            @if ($u->getRoleNames()[0] == $rol)
                                            {{'selected'}}
                                            @endif>{{$rol}}</option>                        
                                        @endforeach
                                    </select>
                                </div>
                                    <span class="badge badge-danger">{{ $errors->first('rol')}}</span>
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

</script>
@endsection