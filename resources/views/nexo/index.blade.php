@extends('layouts.main')

@section('content')
<div class="container-fluid">
  @include('flash::message')
	<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">LISTADO DE NEXOS EN DESARROLLO</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>DIRECCION</th>
                                <th>CLAVE</th>
                                <th>ACCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($nexos as $row)
                                <tr>
                                    <td> {{ $row->id }} </td>
                                    <td> {{ $row->direccion}} </td>
                                    <td> {{ $row->clave }}  </td>
                                    <td>
                                        <a href="{{ route('nexo.edit',$row->id) }}" class="btn btn-success justify-content-center">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                        <a href="" class="btn btn-danger justify-content-center">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $nexos->links() }}
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection 