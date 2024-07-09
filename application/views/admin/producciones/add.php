
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nota de Producción
        <small>Nueva</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url();?>produccion/producciones/store" method="POST" id="addProduccion" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Producto:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idProductocatalogo" id="idProductocatalogo">
                                        <input type="text" class="form-control" disabled="disabled" id="productoCatalogo">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default-pc" ><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
                                <div class="col-md-3">
                                    <label for="">Subcentro de Costos:</label>
                                    <input type="hidden" class="form-control" id="subcentro_id" name="subcentro_id">
                                    <input type="text" class="form-control" id="subcentro_nombre" name="subcentro_nombre" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Presentación:</span>
                                        <input type="text" class="form-control" placeholder="Presentación" id="presentacion" name="presentacion" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Precio Venta:</span>
                                        <input type="text" class="form-control" placeholder="Precio Venta" id="precio_venta" name="presion_venta" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 <?php echo form_error("lote") !=false ? 'has-error':'';?>">
                                    <label for="">Lote:</label>
                                    <input type="text" class="form-control" id="lote" name="lote" value="<?php echo set_value("lote");?>">
                                    <?php echo form_error("lote","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-3 <?php echo form_error("prototipo") !=false ? 'has-error':'';?>">
                                    <label for="">Prototipo:</label>
                                    <select class="form-control" id="prototipo" name="prototipo">
                                        <option value="">----- Seleccione -----</option>
                                        <option value="1"<?php echo set_select("prototipo",1)?>>SI</option>
                                        <option value="0"<?php echo set_select("prototipo",0)?>>NO</option>
                                    </select>
                                    <?php echo form_error("prototipo","<span class='help-block'>","</span>");?>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 <?php echo form_error("trimestre") !=false ? 'has-error':'';?>">
                                    <label for="">Trimestre:</label>
                                    <select class="form-control" id="trimestre" name="trimestre">
                                        <option value="">----- Seleccione -----</option>
                                        <option value="1"<?php echo set_select("trimestre",1)?>>1</option>
                                        <option value="2"<?php echo set_select("trimestre",2)?>>2</option>
                                        <option value="3"<?php echo set_select("trimestre",3)?>>3</option>
                                        <option value="4"<?php echo set_select("trimestre",4)?>>4</option>
                                    </select>
                                    <?php echo form_error("trimestre","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-3 <?php echo form_error("semana") !=false ? 'has-error':'';?>">
                                    <label for="">Semana:</label>
                                    <select class="form-control" id="semana" name="semana">
                                        <option value="">----- Seleccione -----</option>
                                        <option value="1"<?php echo set_select("semana",1)?>>1</option>
                                        <option value="2"<?php echo set_select("semana",2)?>>2</option>
                                        <option value="3"<?php echo set_select("semana",3)?>>3</option>
                                        <option value="4"<?php echo set_select("semana",4)?>>4</option>
                                        <option value="5"<?php echo set_select("semana",5)?>>5</option>
                                        <option value="6"<?php echo set_select("semana",6)?>>6</option>
                                        <option value="7"<?php echo set_select("semana",7)?>>7</option>
                                        <option value="8"<?php echo set_select("semana",8)?>>8</option>
                                        <option value="9"<?php echo set_select("semana",9)?>>9</option>
                                        <option value="10"<?php echo set_select("semana",10)?>>10</option>
                                        <option value="11"<?php echo set_select("semana",11)?>>11</option>
                                        <option value="12"<?php echo set_select("semana",12)?>>12</option>
                                    </select>
                                    <?php echo form_error("semana","<span class='help-block'>","</span>");?>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="">Fecha Inicio:</label>
                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fechaActual;?>" readonly>
                                </div>
                                <div class="col-md-3 <?php echo form_error("fecha_fin") !=false ? 'has-error':'';?>">
                                    <label for="">Fecha Fin:</label>
                                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?php echo set_value("fecha_fin");?>">
                                    <?php echo form_error("fecha_fin","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-3 <?php echo form_error("fecha_vencimiento") !=false ? 'has-error':'';?>">
                                    <label for="">Fecha Vencimiento:</label>
                                    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="<?php echo set_value("fecha_vencimiento");?>">
                                    <?php echo form_error("fecha_vencimiento","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("instructorEncargado") !=false ? 'has-error':'';?>">
                                    <label for="">Instructor Encargado:</label>
                                    <input type="hidden" class="form-control" id="idInstructorEncargado" name="idInstructorEncargado">
                                    <input type="text" class="form-control" id="instructorEncargado" name="instructorEncargado" value="<?php echo set_value("instructorEncargado");?>">
                                    <?php echo form_error("instructorEncargado","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("encargadoPlanta") !=false ? 'has-error':'';?>">
                                    <label for="">Encargado de la Planta:</label>
                                    <input type="text" class="form-control" id="encargadoPlanta" name="encargadoPlanta" value="<?php echo set_value("encargadoPlanta");?>">
                                    <?php echo form_error("encargadoPlanta","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 <?php echo form_error("tipoEncargado") !=false ? 'has-error':'';?>">
                                    <label for="">Grupo Encargado:</label>
                                    <select name="tipoEncargado" id="tipoEncargado" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($tipoEncargados as $tipoEncargado):?>
                                            <option value="<?php echo $tipoEncargado->id;?>"<?php echo set_select("tipoEncargado",$tipoEncargado->id)?>><?php echo $tipoEncargado->nombre?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("tipoEncargado","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-3 <?php echo form_error("ficha_encargado") !=false ? 'has-error':'';?>">
                                    <label for=""># Ficha:</label>
                                    <input type="text" class="form-control" id="ficha_encargado" name="ficha_encargado" value="<?php echo set_value("ficha_encargado");?>">
                                    <?php echo form_error("ficha_encargado","<span class='help-block'>","</span>");?>
                                </div>  
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Materias Primas e Insumos:</label>
                                    <input type="text" class="form-control" id="pMateriaPrimaInsumo">
                                </div>
                                <div class="col-md-2">
                                    <label for="">&nbsp;</label>
                                    <button id="btn-agregar-pMateriaPrimaInsumo" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                </div>
                            </div>
                            <table id="tbMateriaPrimaInsumo" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th># Lote</th>
                                        <th>Nombre</th>
                                        <th>Referencia</th>
                                        <th>Precio Unitario</th>
                                        <th>Stock Max.</th>
                                        <th>Cantidad a Utilizar</th>
                                        <th>Precio Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total Cantidad Utilizada:</span>
                                        <input type="text" class="form-control" name="total_cantidad_peso_inicial" id="total_cantidad_peso_inicial" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total Precio Elementos:</span>
                                        <input type="text" class="form-control" name="costoProduccion" id="costoProduccion" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-3 <?php echo form_error("unidades_elaboradas_pt") !=false ? 'has-error':'';?>">
                                    <label for="">Total Unidades Elaboradas PT:</label>
                                    <input type="text" class="form-control" id="unidades_elaboradas_pt" name="unidades_elaboradas_pt" value="<?php echo set_value("unidades_elaboradas_pt");?>">
                                    <?php echo form_error("unidades_elaboradas_pt","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Total Cantidad PT:</label>
                                    <input type="text" class="form-control" id="total_cantidad_pt" name="total_cantidad_pt" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Rendimiento:</label>
                                    <input type="text" class="form-control" id="rendimiento" name="rendimiento" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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

<div class="modal fade" id="modal-default-pc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Lista de Productos Catalogo</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre o Descripción</th>
                            <th>Presentación</th>
                            <th>Precio Venta</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($productoscatalogos)):?>
                            <?php foreach($productoscatalogos as $productoscatalogo):?>
                                <tr>
                                    <td><?php echo $productoscatalogo->id;?></td>
                                    <td><?php echo $productoscatalogo->nombre;?></td>
                                    <td><?php echo $productoscatalogo->presentacion ." - ". $productoscatalogo->unidadMedidaSigla;?></td>
                                    <td><?php echo $peso . $productoscatalogo->precio_venta;?></td>
                                    <?php 
                                    $dataProductoscatalogo = $productoscatalogo->id."*".$productoscatalogo->nombre."*".$productoscatalogo->presentacion."*".$peso.$productoscatalogo->precio_venta."*".$productoscatalogo->subcentroNombre."*".$productoscatalogo->subcentroCodigo;?>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-check" value="<?php echo $dataProductoscatalogo;?>"><span class="fa fa-check"></span></button>
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
