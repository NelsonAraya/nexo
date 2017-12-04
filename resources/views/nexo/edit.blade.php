@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">NEXO</div>
        <div class="panel-body">
          <form name="nexo" method="POST" action="{{ route('nexo.store') }}">
            {{ csrf_field() }}
          	<div class="form-group row">
          		<div class="col-md-2">
          			<label for="rol">Nexo:</label>
          			{{ $nexo->usuario->nombres }}
          		</div>
          		<div class="col-md-3">
          			<label for="dire">DIRECCION:</label>
          			{{ $nexo->direccion }}
          		</div>
          		<div class="col-md-2">
          			<label for="clave">CLAVE:</label>
          			{{ $nexo->clave }}
          		</div>
          		<div class="col-md-2">
          			<label class="checkbox-inline">
                  <input type="checkbox" name="unidades[]" value="B5">B5
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="unidades[]" value="Q5">Q5
                </label>
          		</div>
              <div class="col-md-3">
                <label for="obac_cbi">OBAC CBI:</label>
                <input type="text" name="obac_cbi" class="form-control" autocomplete="off">
              </div>
          	</div>
            <div class="btn-group">
              <a class="btn btn-success" data-toggle="modal" data-target="#grupos" role="button">GRUPOS</a>
              <a class="btn btn-info" data-toggle="modal" data-target="#asistencia" role="button">ASISTENCIA</a>
              <a href="#" class="btn btn-primary" role="button">INVENTARIO</a>
            </div>
          </form>
        </div>
    </div>

    <div id="grupos" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Grupos NEXOS</h4>
          </div>
          <div class="modal-body">
              <form>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="team">NOMBRE EQUIPO:</label>
                    <input type="text" id="team" name="team" class="form-control">
                  </div>
                   <div class="col-md-6">
                    <label for="obacteam">OBAC EQUIPO:</label>
                    <input type="text" id="obacteam" name="obacteam" class="form-control">
                  </div>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <div id="asistencia" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ASISTENCIA VOLUNTARIO</h4>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('nexo.usuario',$nexo->id) }}">
                {{ csrf_field() }}
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="vol">NOMBRE VOLUNTARIO:</label>
                    <input type="text" id="vol" name="vol" class="form-control">
                  </div>
                  <div class="col-md-2">
                    <label for="btn_agregar">AGREGAR:</label>
                    <button id="btn_asistencia" class="btn btn-success">Agregar</button>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <table id="tbl_asistencia" class="table">
                      <thead>
                        <tr>
                          <th>ROL</th>
                          <th>NOMBRE</th>
                          <th>ESTADO</th>
                        </tr>
                      </thead>
                    </table>
                  </div>  
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection 

@section('js')
<script>
$(function() {
    $('#tbl_asistencia').DataTable({
       "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
        "ordering": false,
        "paging": false,
        "searching": false
    });

    $("#vol").autocomplete({
    source: "{{ URL('vol/busqueda') }}",
    minLength: 3,
    select: function(event, ui) {
      $('#vol').val(ui.item.value);
      $("#vol").attr("data-id", ui.item.id);
    }
  });

});
</script>
@endsection 