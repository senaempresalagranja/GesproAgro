
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Producción
        <small>Analisis Sensorial</small>
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
                        <form id="addAnalisisSensorial" action="<?php echo base_url();?>produccion/producciones/storeAnalisisSensorial" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $produccion->id;?>" name="idProduccionAs">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="">Nombre del Producto:</label>
                                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="<?php echo $produccion->productoCatalogo;?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fecha Analisis:</label>
                                    <input type="date" class="form-control" id="fechaAnalisis" name="fechaAnalisis" value="<?php echo $fechaActual;?>" readonly>
                                </div>
                            </div>
                            <!------------------------------------------------------->
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Escala Hedónica Verbal y Ordinal:</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="">Caracteristica:</label>
                                    <input type="text" class="form-control" id="caracteristica1" name="caracteristica1" value="Sabor" readonly>
                                </div>
                                <div class="col-md-3 <?php echo form_error("atributo1") !=false ? 'has-error':'';?>">
                                    <label for="">Atributo:</label>
                                    <select class="form-control" id="atributo1" name="atributo1">
                                        <option value="">----- Seleccione -----</option>
                                        <option value="Dulce"<?php echo set_select("atributo1","Dulce")?>>Dulce</option>
                                        <option value="Umami"<?php echo set_select("atributo1","Umami")?>>Umami</option>
                                        <option value="Acido"<?php echo set_select("atributo1","Acido")?>>Acido</option>
                                        <option value="Amargo"<?php echo set_select("atributo1","Amargo")?>>Amargo</option>
                                        <option value="Salado"<?php echo set_select("atributo1","Salado")?>>Salado</option>
                                        <option value="Simple"<?php echo set_select("atributo1","Simple")?>>Simple</option>
                                        <option value="Agrio"<?php echo set_select("atributo1","Agrio")?>>Agrio</option>
                                        <option value="Astringente"<?php echo set_select("atributo1","Astringente")?>>Astringente</option>
                                        <option value="Insaboro"<?php echo set_select("atributo1","Insaboro")?>>Insaboro</option>
                                        <option value="Insipido"<?php echo set_select("atributo1","Insipido")?>>Insipido</option>
                                        <option value="Ardiente"<?php echo set_select("atributo1","Ardiente")?>>Ardiente</option>
                                    </select>
                                    <?php echo form_error("atributo1","<span class='help-block'>","</span>");?>
                                </div> 
                                <div class="col-md-3 <?php echo form_error("puntuacion1") !=false ? 'has-error':'';?>">
                                    <label for="">Puntuación:</label>
                                    <input type="text" class="form-control" id="puntuacion1" name="puntuacion1" value="<?php echo set_value("puntuacion1");?>">
                                    <?php echo form_error("puntuacion1","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="caracteristica2" name="caracteristica2" value="Color" readonly>
                                </div>
                                <div class="col-md-3 <?php echo form_error("atributo2") !=false ? 'has-error':'';?>">
                                    <select class="form-control" id="atributo2" name="atributo2">
                                        <option value="">----- Seleccione -----</option>
                                        <option value="Traslucido"<?php echo set_select("atributo2","Traslucido")?>>Traslucido</option>
                                        <option value="Claro"<?php echo set_select("atributo2","Claro")?>>Claro</option>
                                        <option value="Opaco"<?php echo set_select("atributo2","Opaco")?>>Opaco</option>
                                        <option value="Brillante"<?php echo set_select("atributo2","Brillante")?>>Brillante</option>
                                        <option value="Palido"<?php echo set_select("atributo2","Palido")?>>Palido</option>
                                        <option value="Oscuro"<?php echo set_select("atributo2","Oscuro")?>>Oscuro</option>
                                    </select>
                                    <?php echo form_error("atributo2","<span class='help-block'>","</span>");?>
                                </div> 
                                <div class="col-md-3 <?php echo form_error("puntuacion2") !=false ? 'has-error':'';?>">
                                    <input type="text" class="form-control" id="puntuacion2" name="puntuacion2" value="<?php echo set_value("puntuacion2");?>">
                                    <?php echo form_error("puntuacion2","<span class='help-block'>","</span>");?>
                                </div>
                            </div>    
                            <div class="form-group">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="caracteristica3" name="caracteristica3" value="Olor o Aroma" readonly>
                                </div>
                                <div class="col-md-3 <?php echo form_error("atributo3") !=false ? 'has-error':'';?>">
                                    <select class="form-control" id="atributo3" name="atributo3">
                                        <option value="">----- Seleccione -----</option>
                                        <option value="Rancio"<?php echo set_select("atributo3","Rancio")?>>Rancio</option>
                                        <option value="Ligero"<?php echo set_select("atributo3","Ligero")?>>Ligero</option>
                                        <option value="Putrido"<?php echo set_select("atributo3","Putrido")?>>Putrido</option>
                                        <option value="Ahumado"<?php echo set_select("atributo3","Ahumado")?>>Ahumado</option>
                                        <option value="Quemado"<?php echo set_select("atributo3","Quemado")?>>Quemado</option>
                                        <option value="Aromatico"<?php echo set_select("atributo3","Aromatico")?>>Aromatico</option>
                                        <option value="Acido"<?php echo set_select("atributo3","Acido")?>>Acido</option>
                                        <option value="Amargo"<?php echo set_select("atributo3","Amargo")?>>Amargo</option>
                                        <option value="Dulce"<?php echo set_select("atributo3","Dulce")?>>Dulce</option>
                                        <option value="Caracteristico"<?php echo set_select("atributo3","Caracteristico")?>>Caracteristico</option>
                                    </select>
                                    <?php echo form_error("atributo3","<span class='help-block'>","</span>");?>
                                </div> 
                                <div class="col-md-3 <?php echo form_error("puntuacion3") !=false ? 'has-error':'';?>">
                                    <input type="text" class="form-control" id="puntuacion3" name="puntuacion3" value="<?php echo set_value("puntuacion3");?>"> 
                                    <?php echo form_error("puntuacion3","<span class='help-block'>","</span>");?> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="caracteristica4" name="caracteristica4" value="Textura" readonly>
                                </div>
                                <div class="col-md-3 <?php echo form_error("atributo4") !=false ? 'has-error':'';?>">
                                    <select class="form-control" id="atributo4" name="atributo4">
                                        <option value="">----- Seleccione -----</option>
                                        <option value="Liso"<?php echo set_select("atributo4","Liso")?>>Liso</option>
                                        <option value="Rugoso"<?php echo set_select("atributo4","Rugoso")?>>Rugoso</option>
                                        <option value="Duro"<?php echo set_select("atributo4","Duro")?>>Duro</option>
                                        <option value="Suave"<?php echo set_select("atributo4","Suave")?>>Suave</option>
                                        <option value="Compacto"<?php echo set_select("atributo4","Compacto")?>>Compacto</option>
                                        <option value="Grumoso"<?php echo set_select("atributo4","Grumoso")?>>Grumoso</option>
                                        <option value="Jugoso"<?php echo set_select("atributo4","Jugoso")?>>Jugoso</option>
                                        <option value="Cremoso"<?php echo set_select("atributo4","Cremoso")?>>Cremoso</option>
                                        <option value="Esponjoso"<?php echo set_select("atributo4","Esponjoso")?>>Esponjoso</option>
                                        <option value="Granulado"<?php echo set_select("atributo4","Granulado")?>>Granulado</option>
                                        <option value="Denso"<?php echo set_select("atributo4","Denso")?>>Denso</option>
                                        <option value="Blando"<?php echo set_select("atributo4","Blando")?>>Blando</option>
                                        <option value="Firme"<?php echo set_select("atributo4","Firme")?>>Firme</option>
                                        <option value="Cohesivo"<?php echo set_select("atributo4","Cohesivo")?>>Cohesivo</option>
                                        <option value="Pulverulento"<?php echo set_select("atributo4","Pulverulento")?>>Pulverulento</option>
                                        <option value="Crocante"<?php echo set_select("atributo4","Crocante")?>>Crocante</option>
                                        <option value="Quebradizo"<?php echo set_select("atributo4","Quebradizo")?>>Quebradizo</option>
                                        <option value="Harinoso"<?php echo set_select("atributo4","Harinoso")?>>Harinoso</option>
                                        <option value="Gomoso"<?php echo set_select("atributo4","Gomoso")?>>Gomoso</option>
                                    </select>
                                    <?php echo form_error("atributo4","<span class='help-block'>","</span>");?>
                                </div> 
                                <div class="col-md-3 <?php echo form_error("puntuacion4") !=false ? 'has-error':'';?>">
                                    <input type="text" class="form-control" id="puntuacion4" name="puntuacion4" value="<?php echo set_value("puntuacion4");?>">
                                    <?php echo form_error("puntuacion4","<span class='help-block'>","</span>");?>
                                </div>
                            </div>      

                            <!-------------------------------------------------------->
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="puntuacionFinal">Puntuación Final:</label>
                                    <input type="text" class="form-control" id="puntuacionFinal" name="puntuacionFinal" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Analisis de Resultados:</label>
                                    <input type="text" class="form-control" id="analisis_resultados" name="analisis_resultados" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Aceptación:</label>
                                    <input type="text" class="form-control" id="aceptacion" name="aceptacion" readonly>
                                </div>  
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 <?php echo form_error("evaluador") !=false ? 'has-error':'';?>">
                                    <label for="evaluador">Evaluador:</label>
                                    <input type="text" class="form-control" id="evaluador" name="evaluador" value="<?php echo set_value("evaluador");?>">
                                    <?php echo form_error("evaluador","<span class='help-block'>","</span>");?>
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

