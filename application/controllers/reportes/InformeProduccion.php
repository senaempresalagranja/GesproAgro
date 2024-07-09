<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeProduccion extends CI_Controller {

    private $permisos;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->permisos = $this->backend_lib->control();
        $this->load->model('Producciones_model');
    }

    public function index()
	{
        $claseReporte = $this->input->post("claseReporte");
        $peso = "$";
        $porciento = "%";
        $data = array(
            'permisos' => $this->permisos,
            'informeProduccion' => $this->Producciones_model->getInformeProduccion(),
            'reporteLiberacion' => $this->Producciones_model->getReporteLiberacion(),
            'reporteAnalisisSensorial' => $this->Producciones_model->getReporteAnalisisSensorial(),
            'peso' => $peso,
            'claseReporte' => $claseReporte,
            'porciento' => $porciento
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/reportes/informeProduccion',$data);
        $this->load->view('layouts/footer');
    }
}