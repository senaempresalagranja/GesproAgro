<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producciones extends CI_Controller {

    private $permisos;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->permisos = $this->backend_lib->control();
        $this->load->model("Producciones_model");
        $this->load->model("ProductosCatalogo_model");
        $this->load->model("ControlMateriasPrimasInsumos_model");
    }

    public function index()
	{
        $peso = "$";
        $data = array(
            'permisos' => $this->permisos,
            'producciones' => $this->Producciones_model->getProducciones(),
            'peso' => $peso
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/producciones/list',$data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $peso = "$";
        $fecha = date('Y-m-d');
        $data = array(
            'permisos' => $this->permisos,
            'tipoEncargados' => $this->Producciones_model->getTipoEncargados(),
            'productoscatalogos' => $this->ProductosCatalogo_model->getProductosCatalogos(),
            'subcentro' => $this->ProductosCatalogo_model->getSubcentro(),
            'fechaActual' => $fecha,
            'peso' => $peso
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/producciones/add',$data);
        $this->load->view('layouts/footer');
    }

    public function getInstructorEncargado()
    {
        $valorEncargado = $this->input->post("valorEncargado");
        $instructorEncargado = $this->Producciones_model->getInstructorEncargado($valorEncargado);
        echo json_encode($instructorEncargado);
    }

    public function getSubBodegasAutocomplete()
    {
        $valor  = $this->input->post("valor");
        $subBodega  = $this->input->post("subBodega");
        $pMateriaPrimaInsumo = $this->Producciones_model->getSubBodegasAutocomplete($valor,$subBodega);
        echo json_encode($pMateriaPrimaInsumo);
    }
        
    public function store()
    {
        $trimestre = $this->input->post("trimestre");
        $semana = $this->input->post("semana");
        $fecha_inicio = $this->input->post("fecha_inicio");
		$fecha_fin = $this->input->post("fecha_fin");
		$fecha_vencimiento = $this->input->post("fecha_vencimiento");
		$lote = $this->input->post("lote");
        $tipoEncargado = $this->input->post("tipoEncargado");
        $ficha_encargado = $this->input->post("ficha_encargado");
        $prototipo = $this->input->post("prototipo");
        $unidades_elaboradas_pt = $this->input->post("unidades_elaboradas_pt");
        $total_cantidad_peso_inicial = $this->input->post("total_cantidad_peso_inicial");
        $total_cantidad_pt = $this->input->post("total_cantidad_pt");
        $rendimiento = $this->input->post("rendimiento");
        $idProductocatalogo = $this->input->post("idProductocatalogo");
        $idusuario = $this->session->userdata("id");
        $costoProduccion = $this->input->post("costoProduccion");
        $stock = $this->input->post("unidades_elaboradas_pt");
        $idInstructorEncargado = $this->input->post("idInstructorEncargado");
        $instructorEncargado = $this->input->post("instructorEncargado");
        $encargadoPlanta = $this->input->post("encargadoPlanta");
        
        $idSubBodega = $this->input->post("idSubBodega");
        $referencia = $this->input->post("referencia");
        $cantidadUtilizar = $this->input->post("cantidadUtilizar");
        $percioTotal = $this->input->post("percioTotal");

        $this->form_validation->set_rules("trimestre","Seleccione Trimestre","required");
        $this->form_validation->set_rules("semana","Seleccione Semana","required");
        $this->form_validation->set_rules("fecha_fin","Seleccione Fecha Fin","required");
        $this->form_validation->set_rules("fecha_vencimiento","Seleccione Fecha Vencimiento","required");
        $this->form_validation->set_rules("lote","Lote","required|is_unique[producciones.lote]");
        $this->form_validation->set_rules("tipoEncargado","Seleccione Grupo Encargado","required");
        $this->form_validation->set_rules("ficha_encargado","# Ficha","required");
        $this->form_validation->set_rules("prototipo","Seleccione Prototipo","required");
        $this->form_validation->set_rules("unidades_elaboradas_pt","Unidades Elaboradas PT","required");
        $this->form_validation->set_rules("instructorEncargado","Instructor Encargado","required");
        $this->form_validation->set_rules("encargadoPlanta","Encargado de la Planta","required");
       
        if ($this->form_validation->run())
        {
            $data = array(
                'trimestre' => $trimestre,
                'semana' => $semana,
                'fecha_inicio' => $fecha_inicio, 
                'fecha_fin' => $fecha_fin,
                'fecha_vencimiento' => $fecha_vencimiento,
                'lote' => $lote,
                'tipo_encargado_id' => $tipoEncargado,
                'ficha_encargado' => $ficha_encargado,
                'prototipo' => $prototipo,
                'unidades_elaboradas_pt' => $unidades_elaboradas_pt,
                'total_cantidad_peso_inicial' => $total_cantidad_peso_inicial,
                'total_cantidad_pt' => $total_cantidad_pt,
                'rendimiento' => $rendimiento,
                'producto_id' => $idProductocatalogo,
                'usuario_id' => $idusuario,
                'costo_producccion' => $costoProduccion,
                'stock' => $stock,
                'personal_planta_id' => $idInstructorEncargado,
                'encargado_planta' => $encargadoPlanta
            );

            if ($this->Producciones_model->save($data)) {
                $idProduccion = $this->Producciones_model->lastID();
                $this->save_subbodegas_producciones($idSubBodega,$idProduccion,$referencia,$cantidadUtilizar,$percioTotal);
                $this->session->set_flashdata("Registrado","La Información se Guardo Exitosamente");
                redirect(base_url()."produccion/producciones");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."produccion/producciones/add");
            }
        }
        else {
            $this->add();
        }      
    }

    protected function save_subbodegas_producciones($subBodegas,$idProduccion,$referencia,$cantidadUtilizar,$percioTotal)
    {
        for ($i=0; $i < count($subBodegas); $i++) 
        { 
			$data  = array(
				'sub_bodega_id' => $subBodegas[$i], 
				'produccion_id' => $idProduccion,
				'referencia' => $referencia[$i],
				'cantidad' => $cantidadUtilizar[$i],
				'precio_total'=> $percioTotal[$i],
			);

            $this->Producciones_model->save_subbodegas_producciones($data);
            $this->updateStockMpi($subBodegas[$i],$cantidadUtilizar[$i]);
			$this->upddateSubBodega($subBodegas[$i],$cantidadUtilizar[$i]); 
		}
    }

    protected function updateStockMpi($idSubBodega,$cantidadUtilizar)
    {
        $subBodegaActual = $this->Producciones_model->getSubBodegaMpi($idSubBodega);
        $idMateriaPrimaInsumo = $subBodegaActual->idMpi;
        $materiaPrimaInsumoActual = $this->ControlMateriasPrimasInsumos_model->getMateriaPrimaInsumoActual($idMateriaPrimaInsumo);
        $salidas = $materiaPrimaInsumoActual->salidas + $cantidadUtilizar;
        $stock_general = $materiaPrimaInsumoActual->stock_general - $cantidadUtilizar;
		$data = array(
            'salidas' => $salidas,
            'stock_general' => $stock_general,
		);
        $this->ControlMateriasPrimasInsumos_model->updateMateriaPrimaInsumo($idMateriaPrimaInsumo,$data);
    }

    protected function upddateSubBodega($idSubBodega,$cantidadUtilizar)
    {
		$subBodegaActual = $this->Producciones_model->getSubBodega($idSubBodega);
		$data = array(
            'stock_subBodega' => $subBodegaActual->stock_subBodega - $cantidadUtilizar,
		);
        $this->Producciones_model->updateSubBodega($idSubBodega,$data);
        $this->updateSbEstado($idSubBodega);
    }

    protected function updateSbEstado($idSubBodega)
    {
        $subBodegaActual = $this->Producciones_model->getSubBodega($idSubBodega);

        if ($subBodegaActual->stock_subBodega  == 0) {
            $estado = 0;
        } else {
            return false;
        }
        
        $data = array(
            'estado' => $estado
        );
        $this->Producciones_model->updateSubBodega($idSubBodega,$data);
    }

    public function addLiberacion($id)
    {
        $fecha = date('Y-m-d');
		$data  = array(
            'permisos' => $this->permisos,
            'produccion' => $this->Producciones_model->getProduccion($id),
            'destinos' => $this->Producciones_model->getDestino(),
            'fechaActual' => $fecha
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$data);
		$this->load->view("admin/producciones/addLiberacion",$data);
		$this->load->view("layouts/footer");
    }

    function operacion()
    {
        if ($this->input->post("idDestino")) {
            echo $this->Producciones_model->getOperacion($this->input->post("idDestino"));
        }
    }

    public function storeLiberacion()
    {
        $idProduccion = $this->input->post("idProduccion");
        $destino = $this->input->post("destino");
        $operacion = $this->input->post("operacion");
        $stock = $this->input->post("stock");
        $cantidad_saliente = $this->input->post("cantidad_saliente");
        $fecha = $this->input->post("fecha");
        $responsable_recepcion = $this->input->post("responsable_recepcion");
        $cargo_responsable = $this->input->post("cargo_responsable");
        
        $produccionActual = $this->Producciones_model->getProduccion($idProduccion);

        $comparacion = 2;
        $valorUnitarioPto = $produccionActual->costo_producccion / $produccionActual->unidades_elaboradas_pt;
        $precioTotal =   $valorUnitarioPto * $cantidad_saliente;
        
        $this->form_validation->set_rules("destino","Seleccione Destino","required");
        $this->form_validation->set_rules("operacion","Seleccione Destino","required");
        if ($cantidad_saliente > $produccionActual->stock || $cantidad_saliente <= 0) {
            $stock_max = '|stock_max[Cant Max. Disponible]';
        } else {
            $stock_max = '';
        }
        $this->form_validation->set_rules("cantidad_saliente","Cantidad a Liberar","required".$stock_max);
        $this->form_validation->set_rules("responsable_recepcion","Responsable Recepción","required");
        $this->form_validation->set_rules("cargo_responsable","Cargo Responsable","required");
        
        if ($destino == $comparacion) {
            if ($this->form_validation->run())
            {
                $data = array(
                    'produccion_id' => $idProduccion, 
                    'cantidad_entrante' => $cantidad_saliente,
                    'stock_subBodega' => $cantidad_saliente,
                    'precio_unitario' => $valorUnitarioPto,
                    'precio_total' => $precioTotal,
                    'subcentro_id' => $operacion,
                    'estado' => '1',
                );
                
                if ($this->ControlMateriasPrimasInsumos_model->saveEnvio($data)) {
                    $this->saveLiberacion($idProduccion,$operacion,$cantidad_saliente,$fecha,$responsable_recepcion,$cargo_responsable);
                    $this->updateProduccion($idProduccion,$cantidad_saliente);
                    $this->session->set_flashdata("Liberado","La Producción se Libero Exitosamente");
                    redirect(base_url()."produccion/producciones");
                }
                else {
                    $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                    redirect(base_url()."produccion/producciones/addLiberacion");
                }
            }
            else {
                $this->addLiberacion($idProduccion);
            }
        } else {
            if ($this->form_validation->run())
            {
                $data = array(
                    'produccion_id' => $idProduccion,
                    'operacion_id' => $operacion,
                    'cantidad_saliente' => $cantidad_saliente, 
                    'fecha' => $fecha,
                    'responsable_recepcion' => $responsable_recepcion,
                    'cargo_responsable' => $cargo_responsable,
                );
                
                if ($this->Producciones_model->saveLiberacion($data)) {
                    $this->updateProduccion($idProduccion,$cantidad_saliente);
                    $this->session->set_flashdata("Liberado","La Producción se Libero Exitosamente");
                    redirect(base_url()."produccion/producciones");
                }
                else {
                    $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                    redirect(base_url()."produccion/producciones/addLiberacion");
                }
            }
            else {
                $this->addLiberacion($idProduccion);
            }
        }             
    }

    protected function saveLiberacion($idProduccion,$operacion,$cantidad_saliente,$fecha,$responsable_recepcion,$cargo_responsable)
    {
        $data = array(
            'produccion_id' => $idProduccion,
            'operacion_id' => $operacion,
            'cantidad_saliente' => $cantidad_saliente, 
            'fecha' => $fecha,
            'responsable_recepcion' => $responsable_recepcion,
            'cargo_responsable' => $cargo_responsable,
        );
        $this->Producciones_model->saveLiberacion($data);
    }

    protected function updateProduccion($idProduccion,$cantidad_saliente)
    {
        $produccionActual = $this->Producciones_model->getProduccionActual($idProduccion);

        $stockLiberacion = $produccionActual->stock - $cantidad_saliente;

        $data = array(
            'stock' => $stockLiberacion
        );
        $this->Producciones_model->updateProduccion($idProduccion,$data);
    }

    public function view()
    {
        $si = "Si";
        $no = "No";
        $peso = "$";
        $porciento = "%";
        $idProduccion = $this->input->post("id"); 
        $data = array(
            'produccion' => $this->Producciones_model->getProduccion($idProduccion),
            'subbodegas_producciones' => $this->Producciones_model->getSubbodegas_producciones($idProduccion),
            'liberacion' => $this->Producciones_model->getLiberacion($idProduccion),
            'analisisSensorialView' => $this->Producciones_model->getAnalisisSensorialView($idProduccion),
            'peso' => $peso,
            'si' => $si,
            'no' => $no,
            'porciento' => $porciento
        );
        $this->load->view("admin/producciones/view",$data);
    }

    public function addAnalisisSensorial($id)
    {
        $fecha = date('Y-m-d');
		$data  = array(
            'permisos' => $this->permisos,
            'produccion' => $this->Producciones_model->getProduccion($id),
            'fechaActual' => $fecha
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$data);
		$this->load->view("admin/producciones/addAnalisisSensorial",$data);
		$this->load->view("layouts/footer");
    }

    public function storeAnalisisSensorial()
    {
        $idProduccionAs = $this->input->post("idProduccionAs");
        $fechaAnalisis = $this->input->post("fechaAnalisis");
        $puntuacionFinal = $this->input->post("puntuacionFinal");
        $analisis_resultados = $this->input->post("analisis_resultados");
        $aceptacion = $this->input->post("aceptacion");
        $evaluador = $this->input->post("evaluador");

        $caracteristica1 = $this->input->post("caracteristica1");
        $caracteristica2 = $this->input->post("caracteristica2");
        $caracteristica3 = $this->input->post("caracteristica3");
        $caracteristica4 = $this->input->post("caracteristica4");
        $atributo1 = $this->input->post("atributo1");
        $atributo2 = $this->input->post("atributo2");
        $atributo3 = $this->input->post("atributo3");
        $atributo4 = $this->input->post("atributo4");
        $puntuacion1 = $this->input->post("puntuacion1");
        $puntuacion2 = $this->input->post("puntuacion2");
        $puntuacion3 = $this->input->post("puntuacion3");
        $puntuacion4 = $this->input->post("puntuacion4");
                     
        $this->form_validation->set_rules("evaluador","Evaluador","required");
        $this->form_validation->set_rules("atributo1","Seleccione Atributo","required");
        $this->form_validation->set_rules("atributo2","Seleccione Atributo","required");
        $this->form_validation->set_rules("atributo3","Seleccione Atributo","required");
        $this->form_validation->set_rules("atributo4","Seleccione Atributo","required");
        if ($puntuacion1 > 5 || $puntuacion1 <= 0) {
            $intervalo_uno_cinco = '|intervalo_uno_cinco';
        } else {
            $intervalo_uno_cinco = '';
        }
        $this->form_validation->set_rules("puntuacion1","Puntuacion","required".$intervalo_uno_cinco);
        if ($puntuacion2 > 5 || $puntuacion1 <= 0) {
            $intervalo_uno_cinco = '|intervalo_uno_cinco';
        } else {
            $intervalo_uno_cinco = '';
        }
        $this->form_validation->set_rules("puntuacion2","Puntuacion","required".$intervalo_uno_cinco);
        if ($puntuacion3 > 5 || $puntuacion1 <= 0) {
            $intervalo_uno_cinco = '|intervalo_uno_cinco';
        } else {
            $intervalo_uno_cinco = '';
        }
        $this->form_validation->set_rules("puntuacion3","Puntuacion","required".$intervalo_uno_cinco);
        if ($puntuacion4 > 5 || $puntuacion1 <= 0) {
            $intervalo_uno_cinco = '|intervalo_uno_cinco';
        } else {
            $intervalo_uno_cinco = '';
        }
        $this->form_validation->set_rules("puntuacion4","Puntuacion","required".$intervalo_uno_cinco);

        $caracteristicas = array(
             $this->input->post("caracteristica1"),
             $this->input->post("caracteristica2"),
             $this->input->post("caracteristica3"), 
             $this->input->post("caracteristica4")
        );

        $atributos = array(
             $this->input->post("atributo1"),
             $this->input->post("atributo2"),
             $this->input->post("atributo3"), 
             $this->input->post("atributo4")
        );

        $puntuaciones = array(
             $this->input->post("puntuacion1"),
             $this->input->post("puntuacion2"),
             $this->input->post("puntuacion3"), 
             $this->input->post("puntuacion4")
        );
    
                
        if ($this->form_validation->run())
        {
            $data = array(
                'fecha' => $fechaAnalisis,
                'puntuacion_final' => $puntuacionFinal,
                'analisis_resultado' => $analisis_resultados,
                'aceptacion' => $aceptacion,
                'evaluador' => $evaluador, 
            );
            if ($this->Producciones_model->saveAnalisisSensorial($data)) {
                $idAnalisisSensorial = $this->Producciones_model->lastAsID();
                $this->save_analisissensorial_producciones($idProduccionAs,$idAnalisisSensorial,$caracteristicas,$atributos,$puntuaciones);
                $this->session->set_flashdata("analisisSensorial","El Analisis Sensorial se realizo exitosamente");
                redirect(base_url()."produccion/producciones");         
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."produccion/producciones/addAnalisisSensorial");
            }
        }
        else {
            $this->addAnalisisSensorial($idProduccionAs);
        }       
    }

    protected function save_analisissensorial_producciones($idProduccionAs,$idAnalisisSensorial,$caracteristicas,$atributos,$puntuaciones)
    {
        for ($i=0; $i < 4; $i++) 
        { 
			$data  = array(
				'produccion_id' => $idProduccionAs, 
				'analisisSensorial_id' => $idAnalisisSensorial,
				'caracteristica' => $caracteristicas[$i],
				'atributo' => $atributos[$i],
				'puntuacion'=> $puntuaciones[$i],
			);

            $this->Producciones_model->save_analisissensorial_producciones($data); 
		}
    }
}