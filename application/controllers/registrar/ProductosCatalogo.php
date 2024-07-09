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
        $this->load->model("ProductosCatalogo_model");
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
        $this->load->view('admin/productosCatalogo/list',$data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data = array(
            'permisos' => $this->permisos,
            'lineaProduccion' => $this->ProductosCatalogo_model->getLineaProduccion(),
            'unidadesMedida' => $this->ProductosCatalogo_model->getUnidadesMedida(),
            'subcentro' => $this->ProductosCatalogo_model->getSubcentro()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/productosCatalogo/add',$data);
        $this->load->view('layouts/footer');
    }    

    public function store()
    {
        $nombre = $this->input->post("nombre");
		$presentacion = $this->input->post("presentacion");
		$unidadesMedida = $this->input->post("unidadesMedida");
		$precio_venta = $this->input->post("precio_venta");
		$subcentro = $this->input->post("subcentro");
        $lineaProduccion = $this->input->post("lineaProduccion");

        $this->form_validation->set_rules("nombre","Nombre","required|is_unique[productos_catalogo.nombre]");
        $this->form_validation->set_rules("presentacion","Presentación","required");
        $this->form_validation->set_rules("unidadesMedida","Seleccionar Unidad Medida","required");
        $this->form_validation->set_rules("precio_venta","Precio Venta ","required");
        $this->form_validation->set_rules("subcentro","Seleccioar Subcentro","required");
        $this->form_validation->set_rules("lineaProduccion","Seleccionar Linea de Producción","required");

        if ($this->form_validation->run())
        {
            $data = array(
                'nombre' => $nombre, 
                'presentacion' => $presentacion,
                'unidad_medida_id' => $unidadesMedida,
                'precio_venta' => $precio_venta,
                'subcentro_id' => $subcentro,
                'linea_produccion_id' => $lineaProduccion,
                'estado' => "1" 
            );
            if ($this->ProductosCatalogo_model->save($data)) {
                $this->session->set_flashdata("Registrado","La Información se Guardo Exitosamente");
                redirect(base_url()."registrar/productosCatalogo");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."registrar/productosCatalogo/add");
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
            'productosCatalogo' => $this->ProductosCatalogo_model->getProductosCatalogo($id),
            'lineaProduccion' => $this->ProductosCatalogo_model->getLineaProduccion(),
            'unidadesMedida' => $this->ProductosCatalogo_model->getUnidadesMedida(),
            'subcentro' => $this->ProductosCatalogo_model->getSubcentro()
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$data);
		$this->load->view("admin/productosCatalogo/edit",$data);
		$this->load->view("layouts/footer");
    }

    public function update()
    {
		$idProductoCatalogo = $this->input->post("idProductoCatalogo");
		$nombre = $this->input->post("nombre");
		$presentacion = $this->input->post("presentacion");
		$unidadesMedida = $this->input->post("unidadesMedida");
		$precio_venta = $this->input->post("precio_venta");
		$subcentro = $this->input->post("subcentro");
        $lineaProduccion = $this->input->post("lineaProduccion");

        $productoCatalogoActual = $this->ProductosCatalogo_model->getProductosCatalogo($idProductoCatalogo);
        
        if ($nombre == $productoCatalogoActual->nombre) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[productos_catalogo.nombre]";
        }
        
        $this->form_validation->set_rules("nombre","Nombre","required".$is_unique);
        $this->form_validation->set_rules("presentacion","Presentación","required");
        $this->form_validation->set_rules("unidadesMedida","Seleccionar Unidad Medida","required");
        $this->form_validation->set_rules("precio_venta","Precio Venta ","required");
        $this->form_validation->set_rules("subcentro","Seleccioar Subcentro","required");
        $this->form_validation->set_rules("lineaProduccion","Seleccionar Linea de Producción","required");

        if ($this->form_validation->run())
        {
            $data = array(
                'nombre' => $nombre, 
                'presentacion' => $presentacion,
                'unidad_medida_id' => $unidadesMedida,
                'precio_venta' => $precio_venta,
                'subcentro_id' => $subcentro,
                'linea_produccion_id' => $lineaProduccion,
            );
    
            if ($this->ProductosCatalogo_model->update($idProductoCatalogo,$data)) {
                $this->session->set_flashdata("Actualizado","La Información se Actualizo Exitosamente");
                redirect(base_url()."registrar/productosCatalogo");
            }
            else{
                $this->session->set_flashdata("error","No se pudo actualizar la informacion");
                redirect(base_url()."registrar/productosCatalogo/edit/".$idProductoCatalogo);
            }
        }
        else {
            $this->edit($idProductoCatalogo);
        }		
    }

    public function delete($id)
    {
        $data = array(
            'estado' => "0" ,
         );
         
         $this->ProductosCatalogo_model->update($id,$data);
         echo "registrar/productosCatalogo";
    }
}