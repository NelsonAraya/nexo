@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('nexo.create')}}" class="btn btn-success" role="button">Iniciar Nexo</a>
            <br><br>

            <div class="panel panel-primary">
                <div class="panel-heading">home</div>
                <div class="panel-body">
                   <h1> Bienvenido al Nexo Dalmacia5 </h1> 
                   Ultimos Nexos Realizados
                   <table class="table table-hover">
                       <thead>
                            <tr>
                                <th>ID</th>
                                <th>CREADO</th>
                                <th>FECHA</th>
                                <th>DIRECCION</th>
                                <th>ACCION</th>
                            </tr>
                       </thead>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
