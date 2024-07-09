
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Control Materias Primas e Insumos
        <small>Envio a Sub Centros de Costos</small>
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
                        <form id="addEnvio" action="<?php echo base_url();?>control/controlMateriasPrimasInsumos/storeEnvio" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $controlMateriaPrimaInsumo->id;?>" name="idBodegaPrincipal">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="mpi">Materiar Prima e Insumo.</label>
                                    <input type="text" class="form-control" id="mpi" name="mpi" value="<?php echo $controlMateriaPrimaInsumo->materiaPrimaInsumo;?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="numero_lote">Numero Lote.</label>
                                    <input type="text" class="form-control" id="numero_lote" name="numero_lote" value="<?php echo $controlMateriaPrimaInsumo->numero_lote;?>" readonly="readonly">
                                </div>
                                <div class="col-md-3">
                                    <label for="stock_bodega_principal">Stock Max. Disponible</label>
                                    <input type="text" class="form-control" id="stock_bodega_principal" name="stock_bodega_principal" value="<?php echo $controlMateriaPrimaInsumo->stock_bodega_principal;?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("subcentro") !=false ? 'has-error':'';?>">
                                        <label for="subcentro">Sub Bodega:</label>
                                        <select name="subcentro" id="subcentro" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <?php foreach($subcentros as $subcentro):?>
                                                <option value="<?php echo $subcentro->id?>"<?php echo set_select("subcentro",$subcentro->id)?>><?php echo $subcentro->nombre;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?php echo form_error("subcentro","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("cantidad_enviar") !=false ? 'has-error':'';?>">
                                    <label for="cantidad_enviar">Cantidad a Enviar:</label>
                                    <input type="text" class="form-control" id="cantidad_enviar" name="cantidad_enviar" value="<?php echo set_value("cantidad_enviar");?>">
                                    <?php echo form_error("cantidad_enviar","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("precio_unitario") !=false ? 'has-error':'';?>">
                                    <label for="precio_unitario">Precio Unitario:</label>
                                    <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" value="<?php echo form_error("precio_unitario") !=false ? set_value("precio_unitario") : $controlMateriaPrimaInsumo->precio_unitario;?>" readonly="readonly">
                                    <?php echo form_error("precio_unitario","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("precio_total") !=false ? 'has-error':'';?>">
                                    <label for="precio_total">Precio Total:</label>
                                    <input type="text" class="form-control" id="precio_total" name="precio_total" value="<?php echo set_value("precio_total");?>" readonly="readonly">
                                    <?php echo form_error("precio_total","<span class='help-block'>","</span>");?>
                                </div>
                            </div>                           
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-flat">Enviar</button>
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