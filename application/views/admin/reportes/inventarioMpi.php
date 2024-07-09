 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         Reportes
        <small>Inventario Materias Primas e Insumos</small>
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
                                    <option value="disponible">Disponible</option>
                                    <option value="salidas">Salidas</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <?php if($claseReporte == "disponible"):?>
                    <div class="col-md-12">
                        <table id="exampleInventarioMpi" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th># Lote</th>
                                    <th>Materia Prima e Insumo</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Stock</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio Total</th>                             
                                    <th>Bodega</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($controlMateriasPrimasInsumos)):?>
                                    <?php foreach($controlMateriasPrimasInsumos as $controlMateriasPrimasInsumo):?>
                                        <tr>
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
                                            <td>Principal</td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                <?php if(!empty($inventarioSubBodegas)):?>
                                    <?php foreach($inventarioSubBodegas as $inventarioSubBodegas):?>
                                        <tr>
                                            <td><?php echo $inventarioSubBodegas->numLoteBodegaP;?></td>
                                            <td><?php echo $inventarioSubBodegas->materiaPrimaInsumo;?></td>
                                            <?php if($inventarioSubBodegas->fecha_vencimiento <= $fecha):?>
                                                <td><?php echo $inventarioSubBodegas->fecha_vencimiento;?> <button type="button" class="btn btn-danger btn-xs">Vencido</button></td>
                                            <?php elseif($inventarioSubBodegas->fecha_vencimiento >= $fecha):?>
                                                <td><?php echo $inventarioSubBodegas->fecha_vencimiento;?> <button type="button" class="btn btn-success btn-xs">Disponible</button></td>
                                            <?php endif;?> 
                                            <td><?php echo number_format($inventarioSubBodegas->stock_subBodega) ." ". $inventarioSubBodegas->unidadMedida;?></td>
                                            <td><?php echo $peso ." ". number_format($inventarioSubBodegas->precio_unitario);?></td>
                                            <td><?php echo $peso ." ". number_format($inventarioSubBodegas->precio_total);?></td>                                           
                                            <td><?php echo $inventarioSubBodegas->subcentro;?></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                <?php if(!empty($inventarioSubBodegasPt)):?>
                                    <?php foreach($inventarioSubBodegasPt as $inventarioSubBodegasPt):?>
                                        <tr>
                                            <td><?php echo $inventarioSubBodegasPt->numLoteProduccion;?></td>
                                            <td><?php echo $inventarioSubBodegasPt->nomProducto;?></td>
                                            <?php if($inventarioSubBodegasPt->fechaVencimientoProduccion <= $fecha):?>
                                                <td><?php echo $inventarioSubBodegasPt->fechaVencimientoProduccion;?> <button type="button" class="btn btn-danger btn-xs">Vencido</button></td>
                                            <?php elseif($inventarioSubBodegasPt->fechaVencimientoProduccion >= $fecha):?>
                                                <td><?php echo $inventarioSubBodegasPt->fechaVencimientoProduccion;?> <button type="button" class="btn btn-success btn-xs">Disponible</button></td>
                                            <?php endif;?> 
                                            <td><?php echo number_format($inventarioSubBodegasPt->stock_subBodega) ." ". $umPt;?></td>
                                            <td><?php echo $peso ." ". number_format($inventarioSubBodegasPt->precio_unitario);?></td>
                                            <td><?php echo $peso ." ". number_format($inventarioSubBodegasPt->precio_total);?></td>                                           
                                            <td><?php echo $inventarioSubBodegasPt->subcentro;?></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                    <?php elseif($claseReporte == "salidas"):?>
                    <div class="col-md-12">
                        <table id="exampleInformeSalidas" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th># Lote MPI</th>
                                    <th>Materia Prima e Insumo</th>
                                    <th>Fecha Salida</th>
                                    <th>Cantidad</th>
                                    <th>Valor</th>
                                    <th>Referencia Salida</th>                             
                                    <th># Lote Producción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($informeSalidas)):?>
                                    <?php foreach($informeSalidas as $informeSalida):?>
                                        <tr>
                                            <td><?php echo $informeSalida->numeroLoteInformeSalida;?></td>
                                            <td><?php echo $informeSalida->nombreMpi;?></td>
                                            <td><?php echo $informeSalida->fechaSalida;?></td>
                                            <td><?php echo number_format($informeSalida->cantidad) ." ". $informeSalida->unidadMedida;?></td>
                                            <td><?php echo $peso ." ". number_format($informeSalida->precio_total);?></td>
                                            <td><?php echo $informeSalida->referencia;?></td>                                           
                                            <td><?php echo $informeSalida->loteProduccion;?></td> 
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif;?> 
                </div>            
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->