@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ml-auto mr-auto">
            

            <div class="brand text-center " style="color: black; margin-top: 25%;">
                <u><h1 class="display-1">Bienvenido</h1></u>
                <u> <h3 class="title text-center display-4">{{Auth::user()->name}}</h3></u>
               
            </div>



{{--             <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
