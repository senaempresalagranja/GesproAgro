<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlMateriasPrimasInsumos extends CI_Controller {

    private $permisos;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->permisos = $this->backend_lib->control();
        $this->load->model("ControlMateriasPrimasInsumos_model");
        $this->load->model("MateriasPrimasInsumos_model");
    }

    public function index()
	{
        $fecha = date('Y-m-d');
        $peso = "$";
        
        $data = array(
            'permisos' => $this->permisos,
            'controlMateriasPrimasInsumos' => $this->ControlMateriasPrimasInsumos_model->getControlMateriasPrimasInsumos(),
            'peso' => $peso,
            'fecha' => $fecha,
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/controlMateriasPrimasInsumos/list',$data);
        $this->load->view('layouts/footer');
    }
       
    public function add()
    {
        $data = array(
            'permisos' => $this->permisos,
            'unidadesMedida' => $this->ControlMateriasPrimasInsumos_model->getUnidadesMedida(),
            'materiasPrimasInsumos' => $this->MateriasPrimasInsumos_model->getMateriasPrimasInsumos()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/controlMateriasPrimasInsumos/add',$data);
        $this->load->view('layouts/footer');
    }  
    
    public function store()
    {
        $idMateriaPrimaInsumo = $this->input->post("idMateriaPrimaInsumo");
        $numero_lote = $this->input->post("numero_lote");
        $fecha_vencimiento = $this->input->post("fecha_vencimiento");
        $cantidad_entrante = $this->input->post("cantidad_entrante");
        $unidadesMedida = $this->input->post("unidadesMedida");
        $precio_total = $this->input->post("precio_total");
        $precio_unitario = $this->input->post("precio_unitario");
        
        
        $this->form_validation->set_rules("numero_lote","Numero de Lote","required|is_unique[bodega_principal.numero_lote]");
        $this->form_validation->set_rules("fecha_vencimiento","Seleccione Fecha Vencimiento","required");
        $this->form_validation->set_rules("cantidad_entrante","Cantidad Entrante","required");
        $this->form_validation->set_rules("unidadesMedida","Selecciones Unidad Medida","required");
        $this->form_validation->set_rules("precio_total","Precio Total","required");
        $this->form_validation->set_rules("precio_unitario","Precio Unitario","required");
        
        if ($this->form_validation->run())
        {
            $data = array(
                'materiaPrima_insumo_id' => $idMateriaPrimaInsumo, 
                'unidad_medida_id' => $unidadesMedida,
                'numero_lote' => $numero_lote,
                'cantidad_entrante' => $cantidad_entrante,
                'precio_total' => $precio_total,
                'precio_unitario' => $precio_unitario,
                'stock_bodega_principal' => $cantidad_entrante,
                'fecha_vencimiento' => $fecha_vencimiento,
                'estado' => '1',
            );
            if ($this->ControlMateriasPrimasInsumos_model->save($data)) {
            $this->updateMateriaPrimaInsumo($idMateriaPrimaInsumo,$cantidad_entrante);
            $this->session->set_flashdata("Registrado","La Información se Guardo Exitosamente");
            redirect(base_url()."control/controlMateriasPrimasInsumos");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."control/controlMateriasPrimasInsumos/add");
            }
        }
        else {
            $this->add();
        }       
    }

    protected function updateMateriaPrimaInsumo($idMateriaPrimaInsumo,$cantidad_entrante)
    {
        $materiaPrimaInsumoActual = $this->ControlMateriasPrimasInsumos_model->getMateriaPrimaInsumoActual($idMateriaPrimaInsumo);

        $totalEntrada = round($materiaPrimaInsumoActual->entradas + $cantidad_entrante);
        $totalStockGeneral = round($materiaPrimaInsumoActual->stock_general + $cantidad_entrante);

        $data = array(
            'entradas' => $totalEntrada, 
            'stock_general' => $totalStockGeneral
        );
        $this->ControlMateriasPrimasInsumos_model->updateMateriaPrimaInsumo($idMateriaPrimaInsumo,$data);
    }

    public function addEnvio($id)
    {
		$data  = array(
            'permisos' => $this->permisos,
            'controlMateriaPrimaInsumo' => $this->ControlMateriasPrimasInsumos_model->getControlMateriaPrimaInsumo($id),
            'subcentros' => $this->ControlMateriasPrimasInsumos_model->getSubcentros(),
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$data);
		$this->load->view("admin/controlMateriasPrimasInsumos/addEnvio",$data);
		$this->load->view("layouts/footer");
    }

    public function storeEnvio()
    {
        $idBodegaPrincipal = $this->input->post("idBodegaPrincipal");
        $cantidad_enviar = $this->input->post("cantidad_enviar");
        $precio_unitario = $this->input->post("precio_unitario");
        $precio_total = $this->input->post("precio_total");
        $subcentro = $this->input->post("subcentro");        
        
        $loteActual = $this->ControlMateriasPrimasInsumos_model->getControlMateriaPrimaInsumo($idBodegaPrincipal);
        
        $this->form_validation->set_rules("subcentro","Seleccione Sub Bodega","required");
        if ($cantidad_enviar > $loteActual->stock_bodega_principal || $cantidad_enviar <= 0) {
            $stock_max = '|stock_max[Stock Max.]';
        } else {
            $stock_max = '';
        }
        $this->form_validation->set_rules('cantidad_enviar','Cantidad a Enviar','required'.$stock_max);

        if ($this->form_validation->run())
        {
            $data = array(
                'bodega_principal_id' => $idBodegaPrincipal, 
                'cantidad_entrante' => $cantidad_enviar,
                'stock_subBodega' => $cantidad_enviar,
                'precio_unitario' => $precio_unitario,
                'precio_total' => $precio_total,
                'subcentro_id' => $subcentro,
                'estado' => '1',
            );
            if ($this->ControlMateriasPrimasInsumos_model->saveEnvio($data)) {
            $this->updateBodegaPrincipal($idBodegaPrincipal,$cantidad_enviar);
            $this->session->set_flashdata("Enviado","La Cantidad Indicada del # de Lote se Envio Exitosamente a la Sub Bodega");
            redirect(base_url()."control/controlMateriasPrimasInsumos");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."control/controlMateriasPrimasInsumos/addEnvio");
            }
        }
        else {
            $this->addEnvio($idBodegaPrincipal);
        }       
    }

    protected function updateBodegaPrincipal($idBodegaPrincipal,$cantidad_enviar)
    {
        $bodegaPrincipalActual = $this->ControlMateriasPrimasInsumos_model->getBodegaPrincipalActual($idBodegaPrincipal);

        $stockBodegaPrincipal = $bodegaPrincipalActual->stock_bodega_principal - $cantidad_enviar;
        $precioTotal = $stockBodegaPrincipal * $bodegaPrincipalActual->precio_unitario;
       
        $data = array(
            'stock_bodega_principal' => $stockBodegaPrincipal,
            'precio_total' => $precioTotal
        );
        $this->ControlMateriasPrimasInsumos_model->updateBodegaPrincipal($idBodegaPrincipal,$data);
        $this->updateBpEstado($idBodegaPrincipal);
    }

    protected function updateBpEstado($idBodegaPrincipal)
    {
        $bodegaPrincipalActual = $this->ControlMateriasPrimasInsumos_model->getBodegaPrincipalActual($idBodegaPrincipal);

        if ($bodegaPrincipalActual->stock_bodega_principal == 0) {
            $estado = 0;
        } else {
            return false;
        }
        
        $data = array(
            'estado' => $estado
        );
        $this->ControlMateriasPrimasInsumos_model->updateBodegaPrincipal($idBodegaPrincipal,$data);
    }
  
    public function delete($id)
    {
        $data = array(
            'estado' => "0" ,
        );
         
        $this->ControlMateriasPrimasInsumos_model->update($id,$data);
        echo "control/controlMateriasPrimasInsumos";
    }
}