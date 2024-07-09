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
        $this->load->model("PersonalPlanta_model");
    }

    public function index()
	{
        $data = array(
            'permisos' => $this->permisos,
            'personalPlanta' => $this->PersonalPlanta_model->getPerosonalPlanta(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/personal_planta/list',$data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data = array(
            'permisos' => $this->permisos,
            'cargo' => $this->PersonalPlanta_model->getCargos(),
            'tipoDocumento' => $this->PersonalPlanta_model->getTipoDocumentos()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/personal_planta/add',$data);
        $this->load->view('layouts/footer');
    }    

    public function store()
    {
        $nombre_completo = $this->input->post("nombre_completo");
		$tipoDocumento = $this->input->post("tipoDocumento");
		$numero_documento = $this->input->post("numero_documento");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $cargo = $this->input->post("cargo");

        $this->form_validation->set_rules("nombre_completo","Nombre Completo","required");
        $this->form_validation->set_rules("tipoDocumento","Seleccionar Tipo de Documento","required");
        $this->form_validation->set_rules("numero_documento","Numero de Documento","required|is_unique[personal_planta.numero_documento]");
        $this->form_validation->set_rules("telefono","Telefono","required");
        $this->form_validation->set_rules("email","Email","required|is_unique[personal_planta.email]");
        $this->form_validation->set_rules("cargo","Seleccionar Cargo","required");

        if ($this->form_validation->run())
        {
            $data = array(
                'nombre_completo' => $nombre_completo, 
                'tipo_documento_id' => $tipoDocumento,
                'numero_documento' => $numero_documento,
                'telefono' => $telefono,
                'email' => $email,
                'cargo_id' => $cargo,
                'estado' => "1" 
            );
            if ($this->PersonalPlanta_model->save($data)) {
                $this->session->set_flashdata("Registrado","La Información se Guardo Exitosamente");
                redirect(base_url()."registrar/personal_planta");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."registrar/personal_planta/add");
            }
        }
        else {
            $this->add();
        }       
    }
   
    public function edit($id)
    {
		$data  = array(
            'permisos' => $this->permisos,
            'perosonaPlanta' => $this->PersonalPlanta_model->getPerosonaPlanta($id),
            'cargo' => $this->PersonalPlanta_model->getCargos(),
            'tipoDocumento' => $this->PersonalPlanta_model->getTipoDocumentos(),
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$data);
		$this->load->view("admin/personal_planta/edit",$data);
		$this->load->view("layouts/footer");
    }

    public function update()
    {
		$idPersonaPlanta = $this->input->post("idPersonaPlanta");
		$nombre_completo = $this->input->post("nombre_completo");
		$tipoDocumento = $this->input->post("tipoDocumento");
		$numero_documento = $this->input->post("numero_documento");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $cargo = $this->input->post("cargo");

        $personaPlantaActual = $this->PersonalPlanta_model->getPerosonaPlanta($idPersonaPlanta);
        
        $this->form_validation->set_rules("nombre_completo","Nombre Completo","required");
        $this->form_validation->set_rules("tipoDocumento","Seleccionar Tipo de Documento","required");
        if ($numero_documento == $personaPlantaActual->numero_documento) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[personal_planta.numero_documento]";
            
        }
        $this->form_validation->set_rules("numero_documento","Numero de Documento","required".$is_unique);
        $this->form_validation->set_rules("telefono","Telefono","required");
        if ($email == $personaPlantaActual->email) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[personal_planta.email]";
        }
        $this->form_validation->set_rules("email","Email","required".$is_unique);
        $this->form_validation->set_rules("cargo","Seleccionar Cargo","required");

        if ($this->form_validation->run())
        {
            $data = array(
                'nombre_completo' => $nombre_completo, 
                'tipo_documento_id' => $tipoDocumento,
                'numero_documento' => $numero_documento,
                'telefono' => $telefono,
                'email' => $email,
                'cargo_id' => $cargo,
            );
    
            if ($this->PersonalPlanta_model->update($idPersonaPlanta,$data)) {
                $this->session->set_flashdata("Actualizado","La Información se Actualizo Exitosamente");
                redirect(base_url()."registrar/personal_planta");
            }
            else{
                $this->session->set_flashdata("Error","No se pudo actualizar la informacion");
                redirect(base_url()."registrar/personal_planta/edit/".$idPersonaPlanta);
            }
        }
        else {
            $this->edit($idPersonaPlanta);
        }		
    }

    public function delete($id)
    {
        $data = array(
            'estado' => "0" ,
        );
         
        $this->PersonalPlanta_model->update($id,$data);
        echo "registrar/personal_planta";
    }
}