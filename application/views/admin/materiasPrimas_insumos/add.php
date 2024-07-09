
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Materias Primas e Insumos
        <small>Nuevo</small>
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
                        <form action="<?php echo base_url();?>registrar/materiasPrimas_insumos/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-6 <?php echo form_error("nombre") !=false ? 'has-error':'';?>">
                                    <label for="nombre">Nombre o Descripción:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value("nombre");?>">
                                    <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("clasificacion") !=false ? 'has-error':'';?>">
                                        <label for="clasificacion">Clasificación:</label>
                                        <select name="clasificacion" id="clasificacion" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <?php foreach($clasificaciones as $clasificacion):?>
                                                <option value="<?php echo $clasificacion->id?>"<?php echo set_select("clasificacion",$clasificacion->id)?>><?php echo $clasificacion->nombre;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?php echo form_error("clasificacion","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" id="guardar" class="btn btn-success btn-flat btn-guardar">Guardar</button>
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