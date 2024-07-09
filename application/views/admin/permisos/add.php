
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Permisos
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
                        <form action="<?php echo base_url();?>administrador/permisos/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("rol") !=false ? 'has-error':'';?>">
                                    <label for="rol">Roles:</label>
                                    <select name="rol" id="rol" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($roles as $rol):?>
                                        <option value="<?php echo $rol->id?>"<?php echo set_select("rol",$rol->id)?>><?php echo $rol->nombre;?></option>
                                    <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("rol","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("menu") !=false ? 'has-error':'';?>">
                                    <label for="menu">Menus:</label>
                                    <select name="menu" id="menu" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($menus as $menu):?>
                                        <option value="<?php echo $menu->id?>" <?php echo set_select("menu",$menu->id)?>><?php echo $menu->nombre;?></option>
                                    <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("menu","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="read">Leer</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="read" value="1" checked="checked">Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="read" value="0" checked="checked">No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="insert">Insertar</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="insert" value="1" checked="checked">Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="insert" value="0" checked="checked">No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="update">Actualizar</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="update" value="1" checked="checked">Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="update" value="0" checked="checked">No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="delete">Eliminar</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="delete" value="1" checked="checked">Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="delete" value="0" checked="checked">No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
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