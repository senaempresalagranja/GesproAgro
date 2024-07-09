
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Producción
        <small>Liberación</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("Error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("Error"); ?></p>                                
                             </div>
                        <?php endif;?> 
                        <form action="<?php echo base_url();?>produccion/producciones/storeLiberacion" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $produccion->id;?>" name="idProduccion">
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("destino") !=false ? 'has-error':'';?>">
                                    <label for="destino">Destino:</label>
                                    <select name="destino" id="destino" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($destinos as $destino):?>
                                        <option value="<?php echo $destino->id?>"<?php echo set_select("destino",$destino->id)?>><?php echo $destino->nombre;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("destino","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4">
                                    <label for="operacion">Operación:</label>
                                    <select name="operacion" id="operacion" class="form-control">
                                        <option value="">Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="stock">Cant Max. Disponible</label>
                                    <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $produccion->stock;?>" readonly="readonly">
                                </div>
                                <div class="col-md-4 <?php echo form_error("cantidad_saliente") !=false ? 'has-error':'';?>">
                                    <label for="cantidad_saliente">Cantidad a Liberar:</label>
                                    <input type="text" class="form-control" id="cantidad_saliente" name="cantidad_saliente" value="<?php echo set_value("cantidad_saliente");?>">
                                    <?php echo form_error("cantidad_saliente","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="fecha">Fecha:</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fechaActual;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("responsable_recepcion") !=false ? 'has-error':'';?>">
                                    <label for="responsable_recepcion">Responsable Recepción:</label>
                                    <input type="text" class="form-control" id="responsable_recepcion" name="responsable_recepcion" value="<?php echo set_value("responsable_recepcion");?>">
                                    <?php echo form_error("responsable_recepcion","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("cargo_responsable") !=false ? 'has-error':'';?>">
                                    <label for="cargo_responsable">Cargo:</label>
                                    <input type="text" class="form-control" id="cargo_responsable" name="cargo_responsable" value="<?php echo set_value("cargo_responsable");?>">
                                    <?php echo form_error("cargo_responsable","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-flat">Liberar</button>
                                </div>
                            </div>
                        </form>
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