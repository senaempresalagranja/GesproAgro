
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Control Materias Primas e Insumos
        <small>Entrada Bodega Principal</small>
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
                        <form action="<?php echo base_url();?>control/controlMateriasPrimasInsumos/store" method="POST" class="form-horizontal" id="add">
                            <div class="form-group">
                                <div class="col-md-6">
                                        <label for="">Materia Prima e Insumo:</label>
                                        <div class="input-group">
                                            <input type="hidden" name="idMateriaPrimaInsumo" id="idMateriaPrimaInsumo">
                                            <input type="text" class="form-control" disabled="disabled" id="materiaPrimaInsumo">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                            </span>
                                        </div><!-- /input-group -->
                                </div> 
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("numero_lote") !=false ? 'has-error':'';?>">
                                    <label for="numero_lote">Numero Lote:</label>
                                    <input type="text" class="form-control" id="numero_lote" name="numero_lote" value="<?php echo set_value("numero_lote");?>">
                                    <?php echo form_error("numero_lote","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("fecha_vencimiento") !=false ? 'has-error':'';?>">
                                    <label for="fecha_vencimiento">Fecha Vencimiento:</label>
                                    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="<?php echo set_value("fecha_vencimiento");?>">
                                    <?php echo form_error("fecha_vencimiento","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("cantidad_entrante") !=false ? 'has-error':'';?>">
                                    <label for="cantidad_entrante">Cantidad Entrante:</label>
                                    <input type="text" class="form-control" id="cantidad_entrante" name="cantidad_entrante" value="<?php echo set_value("cantidad_entrante");?>">
                                    <?php echo form_error("cantidad_entrante","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("unidadesMedida") !=false ? 'has-error':'';?>">
                                    <label for="unidadesMedida">Unidad Medida:</label>
                                    <select name="unidadesMedida" id="unidadesMedida" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($unidadesMedida as $unidadesMedida):?>
                                            <option value="<?php echo $unidadesMedida->id?>"<?php echo set_select("unidadesMedida",$unidadesMedida->id)?>><?php echo $unidadesMedida->sigla ." - ". $unidadesMedida->nombre_completo;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("unidadesMedida","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("precio_total") !=false ? 'has-error':'';?>">
                                    <label for="precio_total">Precio Total:</label>
                                    <input type="text" class="form-control" id="precio_total" name="precio_total" value="<?php echo set_value("precio_total");?>">
                                    <?php echo form_error("precio_total","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("precio_unitario") !=false ? 'has-error':'';?>">
                                    <label for="precio_unitario">Precio Unitario:</label>
                                    <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" value="<?php echo set_value("precio_unitario");?>" readonly="readonly">
                                    <?php echo form_error("precio_unitario","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" id="guardar" class="btn btn-success btn-flat">Guardar</button>
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Lista Materias Primas e Insumos</h4></center>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre o Descripción</th>
                            <th>Clasificación</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($materiasPrimasInsumos)):?>
                            <?php foreach($materiasPrimasInsumos as $materiasPrimasInsumo):?>
                                <tr>
                                    <td><?php echo $materiasPrimasInsumo->id;?></td>
                                    <td><?php echo $materiasPrimasInsumo->nombre;?></td>
                                    <td><?php echo $materiasPrimasInsumo->clasificacion;?></td>
                                    <?php 
                                    $dataMateriasPrimasInsumos = $materiasPrimasInsumo->id."*".$materiasPrimasInsumo->nombre."*".$materiasPrimasInsumo->clasificacion;?>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-check" value="<?php echo $dataMateriasPrimasInsumos;?>"><span class="fa fa-check"></span></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-rigt" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->