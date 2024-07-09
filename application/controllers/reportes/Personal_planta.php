<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_planta extends CI_Controller {

    private $permisos;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->permisos = $this->backend_lib->control();
        $this->load->model('PersonalPlanta_model');
    }

    public function index()
	{
        $data = array(
            'permisos' => $this->permisos,
            'personalPlanta' => $this->PersonalPlanta_model->getPerosonalPlanta()
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/reportes/personal_planta',$data);
        $this->load->view('layouts/footer');
    }

    public function view()
    {
        $id = $this->input->post("idPersonalPlanta"); 
        $data = array(
            'personalPlanta' => $this->PersonalPlanta_model->getPerosonaPlanta($id)
        );
        $this->load->view("admin/personal_planta/view",$data);
    }
}