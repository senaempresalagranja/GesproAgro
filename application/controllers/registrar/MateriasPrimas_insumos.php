<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MateriasPrimas_insumos extends CI_Controller {

    private $permisos;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->permisos = $this->backend_lib->control();
        $this->load->model("MateriasPrimasInsumos_model");
    }

    public function index()
	{
        $data = array(
            'permisos' => $this->permisos,
            'materiasPrimasInsumos' => $this->MateriasPrimasInsumos_model->getMateriasPrimasInsumos(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/materiasPrimas_insumos/list',$data);
        $this->load->view('layouts/footer');
    }
    
    public function add()
    {
        $data = array(
            'permisos' => $this->permisos,
            'clasificaciones' => $this->MateriasPrimasInsumos_model->getClasificaciones()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/materiasPrimas_insumos/add',$data);
        $this->load->view('layouts/footer');
    }  
    
    public function store()
    {
        $nombre = $this->input->post("nombre");
		$clasificacion = $this->input->post("clasificacion");
	
        $this->form_validation->set_rules("nombre","Nombre","required|is_unique[materiasPrimas_insumos.nombre]");
        $this->form_validation->set_rules("clasificacion","Seleccionar Clasificación","required");
        
        
        if ($this->form_validation->run())
        {
            $data = array(
                'nombre' => $nombre, 
                'clasificacion_id' => $clasificacion,
                'estado' => "1" 
            );
                       
            if ($this->MateriasPrimasInsumos_model->save($data)) {
                $this->session->set_flashdata("Registrado","La Información se Guardo Exitosamente");
                redirect(base_url()."registrar/materiasPrimas_insumos");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."registrar/materiasPrimas_insumos/add");
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
            'materiaPrimaInsumo' => $this->MateriasPrimasInsumos_model->getMateriaPrimasInsumo($id),
            'clasificaciones' => $this->MateriasPrimasInsumos_model->getClacificaciones()
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$data);
		$this->load->view("admin/materiasPrimas_insumos/edit",$data);
		$this->load->view("layouts/footer");
    }

    public function update()
    {
		$idMateriaPrimaInsumo = $this->input->post("idMateriaPrimaInsumo");
        $nombre = $this->input->post("nombre");
        $clasificacion = $this->input->post("clasificacion");

        $materiaPrimaInsumoActual = $this->MateriasPrimasInsumos_model->getMateriaPrimasInsumo($idMateriaPrimaInsumo);
        if ($nombre == $materiaPrimaInsumoActual->nombre) {
            $is_unique = "";
        }
        else {
            $is_unique = "|is_unique[materiasPrimas_insumos.nombre]";
            
        }
        
        $this->form_validation->set_rules("nombre","Nombre","required".$is_unique);
        $this->form_validation->set_rules("clasificacion","Seleccionar Clasificación","required");
        
        if ($this->form_validation->run())
        {
            $data = array(
                'nombre' => $nombre,
                'clasificacion_id' => $clasificacion, 
            );
    
            if ($this->MateriasPrimasInsumos_model->update($idMateriaPrimaInsumo,$data)) {
                $this->session->set_flashdata("Actualizado","La Información se Actualizo Exitosamente");
                redirect(base_url()."registrar/materiasPrimas_insumos");
            }
            else{
                $this->session->set_flashdata("Error","No se pudo Actualizar la información");
                redirect(base_url()."registrar/materiasPrimas_insumos/edit/".$idMateriaPrimaInsumo);
            }
        }
        else {
            $this->edit($idMateriaPrimaInsumo);
        }		
    }

    public function delete($id)
    {
        $data = array(
            'estado' => "0" ,
        );
         
        $this->MateriasPrimasInsumos_model->update($id,$data);
        echo "registrar/materiasPrimas_insumos";
    }
}