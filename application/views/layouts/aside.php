<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">      
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Registrar</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if($permisos->read == 1):?> 
                        <li><a href="<?php echo base_url()?>registrar/materiasPrimas_insumos"><i class="fa fa-circle-o"></i> Materias Primas e Insumos</a></li>
                    <?php endif;?>
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>registrar/personal_planta"><i class="fa fa-circle-o"></i> Personal de Planta</a></li>
                    <?php endif;?>
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>registrar/productosCatalogo"><i class="fa fa-circle-o"></i> Productos Catalogo</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Control</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>control/controlMateriasPrimasInsumos"><i class="fa fa-circle-o"></i> Materias Primas e Insumos</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share-alt"></i> <span>Producción</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>produccion/producciones"><i class="fa fa-circle-o"></i> Nota de Producción</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-print"></i> <span>Reportes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>reportes/inventarioMpi"><i class="fa fa-circle-o"></i>  Materias Primas e Insumos</a></li>
                    <?php endif;?>
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>reportes/personal_planta"><i class="fa fa-circle-o"></i> Personal de Planta</a></li>
                    <?php endif;?>
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>reportes/productosCatalogo"><i class="fa fa-circle-o"></i> Productos Catalogo</a></li>
                    <?php endif;?>
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>reportes/informeProduccion"><i class="fa fa-circle-o"></i> Informe de Producción</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>administrador/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <?php endif;?>
                    <?php if($permisos->read == 1):?>
                        <li><a href="<?php echo base_url()?>administrador/permisos"><i class="fa fa-circle-o"></i> Permisos</a></li>
                    <?php endif;?>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->