 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reportes
        <small>Informe Producción</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <hr>
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Clase de Reporte</label>
                            <div class="col-md-3">
                                <select class="form-control" id="claseReporte" name="claseReporte">
                                    <option value="">----- Seleccione -----</option>
                                    <option value="general">General</option>
                                    <option value="liberacionesPt">Liberación PT</option>
                                    <!--<option value="analisisSensorial">Analisis Sensorial</option>-->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <?php if($claseReporte == "general"):?>
                <div class="row">
                    <div class="col-md-12">
                        <table id="exampleInformeProduccion" class="table table-bordered table-hover display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Consecutivo NP</th>
                                    <th># Lote PT</th> 
                                    <th>Producto Catalogo</th>
                                    <th>Valor Uni.</th>
                                    <th>Unidad Productiva</th>
                                    <th>Trimestre</th>
                                    <th>Semana</th>
                                    <th>Fecha Producción</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Instructor Encargado</th>
                                    <th>Encargado de Planta</th>
                                    <th>Grupo Encargado</th>
                                    <th>Ficha Grupo Encargado</th>
                                    <th>Costo de Producción</th>                   
                                    <th>Rendimiento</th>                                                 
                                    <th>Total PT Elaborados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($informeProduccion)):?>
                                    <?php foreach($informeProduccion as $informeProduccion):?>
                                        <tr>
                                            <td><?php echo $informeProduccion->id;?></td>
                                            <td><?php echo $informeProduccion->lote;?></td> 
                                            <td><?php echo $informeProduccion->productoCatalogo ." (". $informeProduccion->presentacion . $informeProduccion->unidadMedida.")";?></td>
                                            <td><?php echo $peso ." ". number_format($informeProduccion->precio_venta);?></td>
                                            <td><?php echo $informeProduccion->subcentro;?></td>
                                            <td><?php echo $informeProduccion->trimestre;?></td>
                                            <td><?php echo $informeProduccion->semana;?></td>
                                            <td><?php echo $informeProduccion->fecha_fin;?></td>
                                            <td><?php echo $informeProduccion->fecha_vencimiento;?></td>
                                            <td><?php echo $informeProduccion->instructorEncargado;?></td>
                                            <td><?php echo $informeProduccion->encargado_planta;?></td>
                                            <td><?php echo $informeProduccion->tipoEncargado;?></td>
                                            <td><?php echo $informeProduccion->ficha_encargado;?></td>
                                            <td><?php echo $peso ." ". number_format($informeProduccion->costo_producccion);?></td>                                           
                                            <td><?php echo $informeProduccion->rendimiento ." ".$porciento;?></td>
                                            <td><?php echo $informeProduccion->unidades_elaboradas_pt;?></td>                                     
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php elseif($claseReporte == "liberacionesPt"):?>
                <div class="row">
                    <div class="col-md-12">
                        <table id="exampleReporteLiberacion" class="table table-bordered table-hover display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th># Consecutivo<br>Producción</th>
                                    <th># Lote PT</th> 
                                    <th>Nombre PT</th>
                                    <th>Subcentro de Costos</th>
                                    <th>Destino</th>
                                    <th>Operación</th>
                                    <th>Cantidad<br>Liberada</th>
                                    <th>Fecha de<br>Liberación</th>
                                    <th>Responsable<br>Recepción</th>
                                    <th>Cargo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($reporteLiberacion)):?>
                                    <?php foreach($reporteLiberacion as $reporteLiberacion):?>
                                        <tr>
                                            <td><?php echo $reporteLiberacion->numConsecutivo;?></td>
                                            <td><?php echo $reporteLiberacion->loteProduccion;?></td>
                                            <td><?php echo $reporteLiberacion->productoCatalogo;?></td>
                                            <td><?php echo $reporteLiberacion->subcentro;?></td> 
                                            <td><?php echo $reporteLiberacion->destino;?></td>
                                            <td><?php echo $reporteLiberacion->operacion;?></td>
                                            <td><?php echo $reporteLiberacion->cantidad_saliente;?></td>
                                            <td><?php echo $reporteLiberacion->fecha;?></td>
                                            <td><?php echo $reporteLiberacion->responsable_recepcion;?></td>
                                            <td><?php echo $reporteLiberacion->cargo_responsable;?></td>
                                            
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php elseif($claseReporte == "analisisSensorial"):?>
                <div class="row">
                    <div class="col-md-12">
                        <table id="exampleReporteAnalisisSensorial" class="table table-bordered table-hover display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th> 
                                    <th>Cod SubCentro<br>de Costos</th>
                                    <th># Consecutivo<br>Producción</th>
                                    <th># Lote</th>
                                    <th>Nombre del<br>Producto</th>
                                    <th>Caracteristica</th>
                                    <th>Atributo</th>
                                    <th>Puntos</th>
                                    <th>Analisis<br>de Resultados</th>
                                    <th>Puntuación<br>Final</th>
                                    <th>Aceptación</th>
                                    <th>Evaluador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($reporteAnalisisSensorial)):?>
                                    <?php foreach($reporteAnalisisSensorial  as $reporteAnalisisSensorial):?>
                                        <tr>
                                            <td><?php echo $reporteAnalisisSensorial->idAs;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->fecha;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->codigo;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->consecutivo;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->lote;?></td> 
                                            <td><?php echo $reporteAnalisisSensorial->nomPc;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->caracteristica;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->atributo;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->puntuacion;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->analisis_resultado;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->puntuacion_final;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->aceptacion;?></td>
                                            <td><?php echo $reporteAnalisisSensorial->evaluador;?></td>
                                        </tr>                                      
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif;?> 
                   
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

