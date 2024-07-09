<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosCatalogo extends CI_Controller {

    private $permisos;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->permisos = $this->backend_lib->control();
        $this->load->model('ProductosCatalogo_model');
    }

    public function index()
	{
        $peso = "$";
        $data = array(
            'permisos' => $this->permisos,
            'productoscatalogos' => $this->ProductosCatalogo_model->getProductosCatalogos(),
            'peso' => $peso
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/reportes/productosCatalogo',$data);
        $this->load->view('layouts/footer');
    }

    public function view()
    {
        $idProductoCatalogo = $this->input->post("idProductoCatalogo"); 
        $data = array(
            'productosCatalogo' => $this->ProductosCatalogo_model->getProductosCatalogo($idProductoCatalogo)
        );
        $this->load->view("admin/productosCatalogo/view",$data);
    }
    
}