 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reportes
        <small>Productos Catalogo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="exampleProductoCatalogo" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre o Descripción</th>
                                    <th>Presentación</th>
                                    <th>Unidad Medida</th>
                                    <th>Precio Venta</th>
                                    <th>Subcentro de Costo</th>
                                    <th>Línea de Producción</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($productoscatalogos)):?>
                                    <?php foreach($productoscatalogos as $productoscatalogo):?>
                                        <tr>
                                            <td><?php echo $productoscatalogo->id;?></td>
                                            <td><?php echo $productoscatalogo->nombre;?></td>
                                            <td><?php echo $productoscatalogo->presentacion;?></td>
                                            <td><?php echo $productoscatalogo->unidadMedidaSigla;?></td>
                                            <td><?php echo $peso ." ". number_format($productoscatalogo->precio_venta);?></td>
                                            <td><?php echo $productoscatalogo->subcentroNombre;?></td>
                                            <td><?php echo $productoscatalogo->lienaProduccion;?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-productosCatalogo" title="Ver" data-toggle="modal" data-target="#modal-default" value="<?php echo $productoscatalogo->id;?>"><span class="fa fa-eye"></span></button>
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
          <h4 class="modal-title text-center">Información del Producto Catalogo</h4>
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