 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reportes
        <small>Personal de Planta</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="examplePersonalPlanta" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Completo</th>
                                    <th>Tipo Documento</th>
                                    <th>Numero Documento</th>
                                    <th>Cargo</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($personalPlanta)):?>
                                    <?php foreach($personalPlanta as $personalPlanta):?>
                                        <tr>
                                            <td><?php echo $personalPlanta->id;?></td>
                                            <td><?php echo $personalPlanta->nombre_completo;?></td>
                                            <td><?php echo $personalPlanta->tipoDocumentoSigla ." - ". $personalPlanta->tipoDocumentoNombre;?></td>
                                            <td><?php echo $personalPlanta->numero_documento;?></td>
                                            <td><?php echo $personalPlanta->cargo;?></td>
                                            <td><?php echo $personalPlanta->telefono;?></td>
                                            <td><?php echo $personalPlanta->email;?></td>
                                            <td>
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-view-personalPlanta" title="Ver" data-toggle="modal" data-target="#modal-default" value="<?php echo $personalPlanta->id;?>"><span class="fa fa-eye"></span></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>            
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.inicio pantalla modal-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center">Información Personal de Planta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-rigt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /. fin pantalla modal -->