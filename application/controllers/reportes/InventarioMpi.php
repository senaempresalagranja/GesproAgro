<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventarioMpi extends CI_Controller {

    private $permisos;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->permisos = $this->backend_lib->control();
        $this->load->model('ControlMateriasPrimasInsumos_model');
    }

    public function index()
	{
        $fecha = date('Y-m-d');
        $umPt = "u";
        $peso = "$";
        $claseReporte = $this->input->post("claseReporte");
        $data = array(
            'permisos' => $this->permisos,
            'controlMateriasPrimasInsumos' => $this->ControlMateriasPrimasInsumos_model->getLotesMpi(),
            'inventarioSubBodegas' => $this->ControlMateriasPrimasInsumos_model->getInventarioSubBodegas(),
            'inventarioSubBodegasPt' => $this->ControlMateriasPrimasInsumos_model->getInventarioSubBodegasPt(),
            'informeSalidas' => $this->ControlMateriasPrimasInsumos_model->getInformeSalidas(),
            'peso' => $peso,
            'umPt' => $umPt,
            'claseReporte' => $claseReporte,
            'fecha' => $fecha
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/reportes/inventarioMpi',$data);
        $this->load->view('layouts/footer');
    }
}