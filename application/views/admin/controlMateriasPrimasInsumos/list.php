 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Control Materias Primas e Insumos
        <small>Listado Bodega Principal</small>
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
                            <a href="<?php echo base_url();?>control/controlMateriasPrimasInsumos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Entrada Bodega Principal</a>
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
                <?php if($this->session->flashdata("Enviado")):?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-paper-plane-o"></i><?php echo $this->session->flashdata("Enviado"); ?></p>                                
                    </div>
                    <hr>
                <?php endif;?>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th># Lote</th>
                                    <th>Materia Prima e Insumo</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Stock</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio Total</th>                             
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($controlMateriasPrimasInsumos)):?>
                                    <?php foreach($controlMateriasPrimasInsumos as $controlMateriasPrimasInsumo):?>
                                        <tr>
                                            <td><?php echo $controlMateriasPrimasInsumo->id;?></td>
                                            <td><?php echo $controlMateriasPrimasInsumo->numero_lote;?></td>
                                            <td><?php echo $controlMateriasPrimasInsumo->materiaPrimaInsumo;?></td>
                                            <?php if($controlMateriasPrimasInsumo->fecha_vencimiento <= $fecha):?>
                                                <td><?php echo $controlMateriasPrimasInsumo->fecha_vencimiento;?> <button type="button" class="btn btn-danger btn-xs">Vencido</button></td>
                                            <?php elseif($controlMateriasPrimasInsumo->fecha_vencimiento >= $fecha):?>
                                                <td><?php echo $controlMateriasPrimasInsumo->fecha_vencimiento;?> <button type="button" class="btn btn-success btn-xs">Disponible</button></td>
                                            <?php endif;?> 
                                            <td><?php echo number_format($controlMateriasPrimasInsumo->stock_bodega_principal) ." ". $controlMateriasPrimasInsumo->unidadMedida;?></td>
                                            <td><?php echo $peso ." ". number_format($controlMateriasPrimasInsumo->precio_unitario);?></td>
                                            <td><?php echo $peso ." ". number_format($controlMateriasPrimasInsumo->precio_total);?></td>                   
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>control/controlMateriasPrimasInsumos/addEnvio/<?php echo $controlMateriasPrimasInsumo->id;?>" title="Envio Sub Bodegas"  class="btn btn-primary"><span class="fa fa-share"></span></a>
                                                    <?php if($permisos->delete == 1):?> 
                                                        <a href="<?php echo base_url();?>control/controlMateriasPrimasInsumos/delete/<?php echo $controlMateriasPrimasInsumo->id;?>" title="Eliminar" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
          <h4 class="modal-title text-center">Información de las Materias Primas e Insumos</h4>
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