 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Personal de Planta
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($permisos->insert == 1):?>   
                            <a href="<?php echo base_url();?>registrar/personal_planta/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Persona de Planta</a>
                        <?php endif;?>
                    </div>
                </div>
                <hr>
                <?php if($this->session->flashdata("Registrado")):?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-check-circle"></i><?php echo $this->session->flashdata("Registrado"); ?></p>                                
                    </div>
                    <hr>
                <?php endif;?> 
                <?php if($this->session->flashdata("Actualizado")):?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-check-circle"></i><?php echo $this->session->flashdata("Actualizado"); ?></p>                                
                    </div>
                    <hr>
                <?php endif;?> 
                
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
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
                                                    <?php if($permisos->update == 1):?>
                                                        <a href="<?php echo base_url()?>registrar/personal_planta/edit/<?php echo $personalPlanta->id;?>" title="Actualizar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif;?>
                                                    <?php if($permisos->delete == 1):?>
                                                        <a href="<?php echo base_url();?>registrar/personal_planta/delete/<?php echo $personalPlanta->id;?>" title="Eliminar" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                    <?php endif;?>
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