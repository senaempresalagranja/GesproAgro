
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Dashboard
        <small>Panel Control</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $cantMateriasPrimasInsumos;?></h3>

                        <p>Materias Primas e Insumos</p><br>
                    </div>
                    <div class="icon">
                        <!--<i class="ion ion-bag"></i>-->
                    </div>
                    <a href="<?php echo base_url()?>registrar/materiasPrimas_insumos" class="small-box-footer">Ver Materias Primas e Insumos <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $cantProdutosCatalogos;?></h3>

                        <p>Productos Catalogo</p><br>
                    </div>
                    <div class="icon">
                        <!--<i class="ion ion-stats-bars"></i>-->
                    </div>
                    <a href="<?php echo base_url()?>registrar/productosCatalogo" class="small-box-footer">Ver Productos Catalogo <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $cantControlMpi;?></h3>

                        <p>Control<br>Materias Primas e Insumos</p>
                    </div>
                    <div class="icon">
                        <!--<i class="ion ion-person-add"></i>-->
                    </div>
                    <a href="<?php echo base_url()?>control/controlMateriasPrimasInsumos" class="small-box-footer">Ver Control MPI. <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $cantProducciones;?></h3>

                        <p>Notas de Producción</p><br>
                    </div>
                    <div class="icon">
                        <!--<i class="ion ion-pie-graph"></i>-->
                    </div>
                    <a href="<?php echo base_url()?>produccion/producciones" class="small-box-footer">Ver Producciones<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Graficos Estadisticos</h3>

                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="grafico1" style="margin: 0 auto"></div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
