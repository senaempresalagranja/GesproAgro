
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos Catalogo
        <small>Actualizar</small>
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
                        <form action="<?php echo base_url();?>registrar/productoscatalogo/update" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $productosCatalogo->id;?>" name="idProductoCatalogo">
                            <div class="form-group">
                                <div class="col-md-8 <?php echo form_error("nombre") !=false ? 'has-error':'';?>"> 
                                    <label for="nombre">Nombre o Descripción:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo form_error("nombre") !=false ? set_value("nombre") : $productosCatalogo->nombre;?>">
                                    <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("presentacion") !=false ? 'has-error':'';?>"> 
                                    <label for="presentacion">Presentación:</label>
                                    <input type="text" class="form-control" id="presentacion" name="presentacion" value="<?php echo form_error("presentacion") !=false ? set_value("presentacion") : $productosCatalogo->presentacion;?>">
                                    <?php echo form_error("presentacion","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("unidadesMedida") !=false ? 'has-error':'';?>"> 
                                    <label for="unidadesMedida">Unidad Medida:</label>
                                    <select name="unidadesMedida" id="unidadesMedida" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php if(form_error("unidadesMedida") != false || set_value("unidadesMedida") != false): ?>
                                            <?php foreach($unidadesMedida as $unidadesMedida):?>
                                                <option value="<?php echo $unidadesMedida->id?>"<?php echo set_select("unidadesMedida",$unidadesMedida->id)?>><?php echo $unidadesMedida->sigla ." - ". $unidadesMedida->nombre_completo;?></option>
                                            <?php endforeach;?>
                                        <?php else:?>
                                        <?php foreach($unidadesMedida as $unidadesMedida):?>
                                                <option value="<?php echo $unidadesMedida->id?>"<?php echo $unidadesMedida->id == $productosCatalogo->unidad_medida_id ? 'selected':'';?>><?php echo $unidadesMedida->sigla ." - ". $unidadesMedida->nombre_completo;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                    <?php echo form_error("unidadesMedida","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("precio_venta") !=false ? 'has-error':'';?>">
                                    <label for="precio_venta">Precio Venta:</label>
                                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" value="<?php echo form_error("precio_venta") !=false ? set_value("precio_venta") : $productosCatalogo->precio_venta;?>">
                                    <?php echo form_error("precio_venta","<span class='help-block'>","</span>");?>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("subcentro") !=false ? 'has-error':'';?>"> 
                                    <label for="subcentro">Subcentro de Costo:</label>
                                    <select name="subcentro" id="subcentro" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php if(form_error("subcentro") != false || set_value("subcentro") != false): ?>
                                            <?php foreach($subcentro as $subcentro):?>
                                                <option value="<?php echo $subcentro->id?>"<?php echo set_select("subcentro",$subcentro->id)?>><?php echo $subcentro->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <?php foreach($subcentro as $subcentro):?>
                                                <option value="<?php echo $subcentro->id?>"<?php echo $subcentro->id == $productosCatalogo->subcentro_id ? 'selected':'';?>><?php echo $subcentro->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                    <?php echo form_error("subcentro","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("lineaProduccion") !=false ? 'has-error':'';?>">
                                    <label for="lineaProduccion">Linea de Producción:</label>
                                    <select name="lineaProduccion" id="lineaProduccion" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php if(form_error("lineaProduccion") != false || set_value("lineaProduccion") != false): ?>
                                            <?php foreach($lineaProduccion as $lineaProduccion):?>
                                                <option value="<?php echo $lineaProduccion->id?>"<?php echo set_select("lineaProduccion",$lineaProduccion->id)?>><?php echo $lineaProduccion->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <?php foreach($lineaProduccion as $lineaProduccion):?>
                                                <option value="<?php echo $lineaProduccion->id?>"<?php echo $lineaProduccion->id == $productosCatalogo->linea_produccion_id ? 'selected':'';?>><?php echo $lineaProduccion->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>                                    
                                    </select>
                                    <?php echo form_error("lineaProduccion","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4"> 
                                    <button type="submit" class="btn btn-warning btn-flat">Actualizar</button>
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