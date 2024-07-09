 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nota de Producción
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
                            <a href="<?php echo base_url();?>produccion/producciones/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Nota de Producción</a>
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
                <?php if($this->session->flashdata("Liberado")):?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-paper-plane-o"></i><?php echo $this->session->flashdata("Liberado"); ?></p>                                
                    </div>
                    <hr>
                <?php endif;?>
                <?php if($this->session->flashdata("analisisSensorial")):?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-check-circle"></i><?php echo $this->session->flashdata("analisisSensorial"); ?></p>                                
                    </div>
                    <hr>
                <?php endif;?> 
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lote</th>
                                    <th>Nombre<br>Producción</th>
                                    <th>Grupo<br> Encargado</th>
                                    <th>Fecha<br>Vencimiento</th>
                                    <th>Costo<br>Producción</th>
                                    <th>Unidades<br>Elaboradas PT</th>
                                    <th>Liberación</th>                               
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($producciones)):?>
                                    <?php foreach($producciones as $produccion):?>
                                        <tr>
                                            <td><?php echo $produccion->id;?></td>
                                            <td><?php echo $produccion->lote;?></td> 
                                            <td><?php echo $produccion->productoCatalogo;?></td> 
                                            <td><?php echo $produccion->tipoEncargado;?></td>
                                            <td><?php echo $produccion->fecha_vencimiento;?></td> 
                                            <td><?php echo $peso ." ". number_format($produccion->costo_producccion);?></td> 
                                            <td><?php echo $produccion->unidades_elaboradas_pt;?></td>
                                            <td>
                                                <?php if($produccion->stock <= 0):?>
                                                    <button type="button" class="btn btn-success btn-xs"> Completa </button>
                                                <?php elseif($produccion->stock > 0):?>
                                                    <button type="button" class="btn btn-danger btn-xs"> Faltan: <?php echo $produccion->stock; ?></button> 
                                                <?php endif;?>
                                            </td>                                           
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-produccion" title="Ver" data-toggle="modal" data-target="#modal-default" value="<?php echo $produccion->id;?>"><span class="fa fa-eye"></span></button>
                                                    <?php if($produccion->stock <= 0):?>
                                                    
                                                    <?php elseif($produccion->stock > 0):?>
                                                        <a href="<?php echo base_url()?>produccion/producciones/addLiberacion/<?php echo $produccion->id;?>" title="Liberar" class="btn btn-primary"><span class="fa fa-mail-forward"></span></a>
                                                    <?php endif;?>
                                                    <!--<a href="<?php echo base_url()?>produccion/producciones/addAnalisisSensorial/<?php echo $produccion->id;?>" title="Analisis Sensorial" class="btn bg-navy"><span class="fa fa-eyedropper"></span></a>-->
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
          <h4 class="modal-title text-center">Información de la Producción</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print">Imprimir</span></button>                                                
        <button type="button" class="btn btn-danger pull-rigt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /. fin pantalla modal -->