
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Personal de Planta
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
                        <form action="<?php echo base_url();?>registrar/personal_planta/update" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $perosonaPlanta->id;?>" name="idPersonaPlanta">
                            <div class="form-group">
                                <div class="col-md-6 <?php echo form_error("nombre_completo") !=false ? 'has-error':'';?>">
                                    <label for="nombre_completo">Nombre Completo:</label>
                                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="<?php echo form_error("nombre_completo") !=false ? set_value("nombre_completo") : $perosonaPlanta->nombre_completo;?>">
                                    <?php echo form_error("nombre_completo","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("tipoDocumento") !=false ? 'has-error':'';?>">
                                    <label for="tipoDocumento">Tipo de Documento:</label>
                                    <select name="tipoDocumento" id="tipoDocumento" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php if(form_error("tipoDocumento") != false || set_value("tipoDocumento") != false): ?>
                                            <?php foreach($tipoDocumento as $tipoDocumento):?>
                                                <option value="<?php echo $tipoDocumento->id?>"<?php echo set_select("tipoDocumento",$tipoDocumento->id)?>><?php echo $tipoDocumento->sigla ." - ". $tipoDocumento->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <?php foreach($tipoDocumento as $tipoDocumento):?>
                                                <option value="<?php echo $tipoDocumento->id?>"<?php echo $tipoDocumento->id == $perosonaPlanta->tipo_documento_id ? 'selected':'';?>><?php echo $tipoDocumento->sigla ." - ". $tipoDocumento->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                    <?php echo form_error("tipoDocumento","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("numero_documento") !=false ? 'has-error':'';?>">
                                    <label for="numero_documento">Numero de Documento:</label>
                                    <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="<?php echo form_error("numero_documento") !=false ? set_value("numero_documento") : $perosonaPlanta->numero_documento;?>">
                                    <?php echo form_error("numero_documento","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("cargo") !=false ? 'has-error':'';?>">
                                    <label for="cargo">Cargo:</label>
                                    <select name="cargo" id="cargo" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php if(form_error("cargo") != false || set_value("cargo") != false): ?>
                                            <?php foreach($cargo as $cargo):?>
                                                <option value="<?php echo $cargo->id?>"<?php echo set_select("cargo",$cargo->id)?>><?php echo $cargo->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <?php foreach($cargo as $cargo):?>
                                                <option value="<?php echo $cargo->id?>"<?php echo $cargo->id == $perosonaPlanta->cargo_id ? 'selected':'';?>><?php echo $cargo->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                    <?php echo form_error("cargo","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4  <?php echo form_error("telefono") !=false ? 'has-error':'';?>">
                                    <label for="telefono">Telefono:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo form_error("telefono") !=false ? set_value("telefono") : $perosonaPlanta->telefono;?>">
                                    <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("email") !=false ? 'has-error':'';?>">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo form_error("email") !=false ? set_value("email") : $perosonaPlanta->email;?>">
                                    <?php echo form_error("email","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
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