@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">CREAR</div>
                <div class="panel-body">
                  <form name="nexo" method="POST" action="{{ route('nexo.store') }}">
                    {{ csrf_field() }}
                  	<div class="form-group row">
                  		<div class="col-md-2">
                  			<label for="rol">ROL:</label>
                  			<input id="rol" name="rol" class="form-control" autocomplete="off"></input>
                  		</div>
                  		<div class="col-md-6">
                  			<label for="dire">DIRECCION:</label>
                  			<input id="dire" name="direccion" class="form-control" autocomplete="off"></input>
                  		</div>
                  		<div class="col-md-2">
                  			<label for="clave">CLAVE:</label>
                  			<input id="clave" name="clave" class="form-control" autocomplete="off"></input>
                  		</div>
                  		<div class="col-md-2">
                  			<label for="clave">CREAR:</label>
                  			<button class="btn btn-success" type="submit">Crear</button>
                  		</div>
                  	</div>
                  </form>
                </div>
            </div>
    </div>
</div>
@endsection 