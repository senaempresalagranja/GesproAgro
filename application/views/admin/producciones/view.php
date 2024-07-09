<br>
<div class="row">
    <div class="col-xs-12 text-center">
        <b>Sistema de Información para la Gestión de la Producción Agroindustrial</b><br>
        <b>GesproAgro</b>
    </div>
</div>
<br>
<table class="table table-bordered">
    <tr>  
        <td>
            <b>Consecutivo: </b><?php echo $produccion->id;?>
        </td>
        <td>
            <b>Prototipo: </b>
            <?php if($produccion->prototipo >= 1):?>
            <?php echo $si;?><br>
            <?php else:?>
            <?php echo $no;?><br>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <b>Lote: </b><?php echo $produccion->lote;?>
        </td>  
    </tr>
    <tr>
        <td>
            <b>Centro de Costos: </b>Agroindustria<br>
            <b>Codigo: </b> 1
        </td>
        <td>
            <b>Subcentro de Costos: </b><?php echo $produccion->subcentro;?><br>
            <b>Codigo: </b> <?php echo $produccion->codigo;?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <b>Producto(Tal como Catalogo de Precios): </b><?php echo $produccion->productoCatalogo;?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Presentación: </b><?php echo $produccion->presentacion." ".$produccion->unidadMedida;?>
        </td>
        <td>
            <b>Precio de Venta: </b><?php echo $peso . $produccion->precio_venta;?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Trimestre: </b><?php echo $produccion->trimestre;?>
        </td>
        <td>
            <b>Semana: </b><?php echo $produccion->semana;?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Fecha Inicio: </b><?php echo $produccion->fecha_inicio;?>
        </td>
        <td>
            <b>Fecha Fin: </b><?php echo $produccion->fecha_fin;?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <b>Fecha Vencimiento: </b><?php echo $produccion->fecha_vencimiento;?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Instructor Encargado: </b><?php echo $produccion->instructorEncargado;?>
        </td>
        <td>
            <b>Encargado de Planta: </b><?php echo $produccion->encargado_planta;?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Grupo Encargado: </b><?php echo $produccion->tipoEncargado;?>
        </td>
        <td>
            <b># Ficha: </b><?php echo $produccion->ficha_encargado;?>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-xs-12">
        <b>Materias Primas e Insumos Utilizados</b>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th># Lote</th>
                    <th>Nombre</th>
                    <th>Fecha Vencimiento</th>
                    <th>Cantidad Utilizada</th>
                    <th>Unidad Medida</th>
                    <th>Referencia</th>
                    <th>Precio Cantidad Utilizada</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($subbodegas_producciones as $subbodegas_produccion):?>
                    <tr>
                        <td><?php echo $subbodegas_produccion->numeroLoteBp;?></td>
                        <td><?php echo $subbodegas_produccion->nombreMpi;?></td>
                        <td><?php echo $subbodegas_produccion->fechaVencimientoBp;?></td>
                        <td><?php echo $subbodegas_produccion->cantidad;?></td>
                        <td><?php echo $subbodegas_produccion->unidadMedida;?></td>
                        <td><?php echo $subbodegas_produccion->referencia;?></td>
                        <td><?php echo $peso . $subbodegas_produccion->precio_total;?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<table class="table table-bordered">
    <tr>
        <td>
            <b>Total Cantidad Utilizada: </b><?php echo $produccion->total_cantidad_peso_inicial;?>
        </td>
        <td>
            <b>Total Cantidad PT: </b><?php echo $produccion->total_cantidad_pt;?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Unidades Elaboradas PT: </b><?php echo $produccion->unidades_elaboradas_pt;?>
        </td>
        <td>
            <b>Rendimiento: </b><?php echo $produccion->rendimiento . $porciento;?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <b>Costo Producción: </b><?php echo $peso . $produccion->costo_producccion;?>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-xs-12">
        <b>Liberaciones</b>
        <?php if( !empty($liberacion)):?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Destino</th>
                    <th>Operación</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Responsable Recepción</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($liberacion as $liberacion):?>
                    <tr>
                        <td><?php echo $liberacion->destino;?></td>
                        <td><?php echo $liberacion->operacion;?></td>
                        <td><?php echo $liberacion->cantidad_saliente;?></td>
                        <td><?php echo $liberacion->fecha;?></td>
                        <td><?php echo $liberacion->responsable_recepcion;?></td>
                        <td><?php echo $liberacion->cargo_responsable;?></td>
                    </tr>
                <?php endforeach;?>  
            </tbody>
        </table>
        <?php else:?>
            <br>
            <table class="table table-bordered">
                <td>Esta Producción no ha Sido Liberada.</td>               
            </table>             
        <?php endif ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <b>Analisis Sensorial</b>
        <?php if( !empty($analisisSensorialView)):?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Puntuación Final</th>
                    <th>Analisis de Resultados</th>
                    <th>Aceptación</th>
                    <th>Evaluador</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $analisisSensorialView->puntuacion_final;?></td>
                    <td><?php echo $analisisSensorialView->analisis_resultado;?></td>
                    <td><?php echo $analisisSensorialView->aceptacion;?></td>
                    <td><?php echo $analisisSensorialView->evaluador;?></td>
                </tr>  
            </tbody>
        </table>
        <?php else:?>
            <br>
            <table class="table table-bordered">
                <td>Esta Producción no tiene Analisis Sensorial.</td>               
            </table>             
        <?php endif ?>
    </div>
</div>
