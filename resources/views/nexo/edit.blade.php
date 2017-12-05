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
              <a id="btn_ver_grupo" class="btn btn-success" data-toggle="modal" data-target="#grupos_detalle" role="button">GRUPOS</a>
              <a id="btn_ver_asis" class="btn btn-info" data-toggle="modal" data-target="#asistencia" role="button">ASISTENCIA</a>
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
              <form method="POST" action="{{ route('nexo.grupo',$nexo->id) }}">
                {{ csrf_field() }}
                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="team">NOMBRE EQUIPO:</label>
                    <input type="text" id="team" name="team" class="form-control" autocomplete="off">
                  </div>
                   <div class="col-md-4">
                    <label for="vol_activo">OBAC EQUIPO:</label>
                    <input type="text" id="vol_activo" name="obacteam" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="funcion">FUNCION:</label>
                    <input type="text" id="funcion" name="funcion" class="form-control" autocomplete="off">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="b_guardar">GUARDAR:</label>
                    <button id="btn_team" type="submit" class="btn btn-primary">Guardar</button>
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


    <div id="grupos_detalle" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Grupos NEXOS</h4>
          </div>
          <div class="modal-body">
              <a id="btn_grupos" class="btn btn-success" data-toggle="modal" 
              data-target="#grupos" role="button">Crear Grupo</a>
              <table id="tbl_grupos" class="table">
                      <thead>
                        <tr>
                          <th>NOMBRE</th>
                          <th>OBAC</th>
                          <th>FUNCION</th>
                          <th>ACCIONES</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
              </table>
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
                      <tbody>
                      </tbody>
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

    var table = $('#tbl_asistencia').DataTable({
       "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
        "ordering": false,
        "paging": false,
        "searching": false
    });

    var table2 = $('#tbl_grupos').DataTable({
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
  $("#vol_activo").autocomplete({
    source: "{{ URL('vol/busquedaActivo') }}",
    minLength: 3,
    select: function(event, ui) {
      $('#vol_activo').val(ui.item.value);
      $("#vol_activo").attr("data-id", ui.item.id);
    }
  });
  
  $("#btn_asistencia").click(function() {
  
   $("#vol").val($("#vol").data("id"));

  });

  $("#btn_ver_asis").click(function(e){
  
    $.ajaxSetup({
    
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
        url : "{{ URL::route('nexo.voluntarios',$nexo->id) }}",
        success : function(data){
          table.clear().draw();
          $.each( data, function( key, value ) {
              table.row.add([
                  value.usuario.rol,
                  value.usuario.nombres,
                  value.estado.nombre
                ]).draw( false );
              });
            }
        });
    });

    $("#btn_ver_grupo").click(function(e){
  
    $.ajaxSetup({
    
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
        url : "{{ URL::route('nexo.gruponexo',$nexo->id) }}",
        success : function(data){
          table2.clear().draw();
          $.each( data, function( key, value ) {
              table2.row.add([
                  value.nombre,
                  value.usuario.nombres,
                  value.funcion,
                  '<a href="#" class="btn btn-success justify-content-center"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a><a href="#" class="btn btn-danger justify-content-center"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'
                ]).draw( false );
              });
            }
        });
    });

    @if(session('modal_asis'))
      $("#btn_ver_asis").click();
    @endif
    @if(session('modal_grupo'))
      $("#btn_ver_grupo").click();
    @endif

    $("#btn_grupos").click(function(){          
          $("#grupos_detalle").modal("hide");
    });

    $("#btn_team").click(function() {
  
      $("#vol_activo").val($("#vol_activo").data("id"));
    });
});
</script>
@endsection 