<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlMateriasPrimasInsumos_model extends CI_Model {

    public function getControlMateriasPrimasInsumos()
    {
        $this->db->select("bp.*,mpi.nombre as materiaPrimaInsumo, um.sigla as unidadMedida");
        $this->db->from("bodega_principal bp");
        $this->db->join("materiasprimas_insumos mpi", "bp.materiaPrima_insumo_id = mpi.id");
        $this->db->join("unidades_medida um", "bp.unidad_medida_id = um.id");
		$this->db->where("bp.estado","1");
        $resultados = $this->db->get();
        return $resultados->result();
	}
	
	public function getControlMateriaPrimaInsumo($id)
    {
        $this->db->select("bp.*,mpi.nombre as materiaPrimaInsumo, um.sigla as unidadMedida");
        $this->db->from("bodega_principal bp");
        $this->db->join("materiasprimas_insumos mpi", "bp.materiaPrima_insumo_id = mpi.id");
		$this->db->join("unidades_medida um", "bp.unidad_medida_id = um.id");
        $this->db->where("bp.id",$id);
        $this->db->where("bp.estado","1");
        $resultado = $this->db->get();
        return $resultado->row();
	}
	
	public function getSubcentros()
    {
		$resultados = $this->db->get("subcentros");
		return $resultados->result();
    }

    public function getUnidadesMedida()
    {
		$resultados = $this->db->get("unidades_medida");
		return $resultados->result();
    }

    public function save($data)
    {
        return $this->db->insert("bodega_principal",$data);
	}
	
	public function getMateriaPrimaInsumoActual($idMateriaPrimaInsumo)
    {
      $this->db->where("id",$idMateriaPrimaInsumo);
      $resultado = $this->db->get("materiasprimas_insumos");
      return $resultado->row();
    }

    public function updateMateriaPrimaInsumo($idMateriaPrimaInsumo,$data)
    {
      $this->db->where("id",$idMateriaPrimaInsumo);
      $this->db->update("materiasprimas_insumos",$data);
	}
	
	public function saveEnvio($data)
    {
        return $this->db->insert("sub_bodegas",$data);
	}
	
	public function getBodegaPrincipalActual($idBodegaPrincipal)
    {
      $this->db->where("id",$idBodegaPrincipal);
      $resultado = $this->db->get("bodega_principal");
      return $resultado->row();
    }

    public function updateBodegaPrincipal($idBodegaPrincipal,$data)
    {
      $this->db->where("id",$idBodegaPrincipal);
      $this->db->update("bodega_principal",$data);
    }
    
    public function update($id,$data)
    {
		$this->db->where("id",$id);
		return $this->db->update("bodega_principal",$data);
    }

    public function getLotesMpi()
    {
      $this->db->select("bp.*,mpi.nombre as materiaPrimaInsumo, um.sigla as unidadMedida");
      $this->db->from("bodega_principal bp");
      $this->db->join("materiasprimas_insumos mpi", "bp.materiaPrima_insumo_id = mpi.id");
      $this->db->join("unidades_medida um", "bp.unidad_medida_id = um.id");
      $this->db->where("bp.estado","1"); 
      $resultados = $this->db->get();
      if ($resultados->num_rows() > 0) {
        return $resultados->result();
      }else{
        return false;
      }
    }
    
    public function getInventarioSubBodegas()
    {
      $this->db->select("sb.*,bp.numero_lote as numLoteBodegaP, bp.fecha_vencimiento, mpi.nombre as materiaPrimaInsumo, um.sigla as unidadMedida, sbc.nombre as subcentro");
      $this->db->from("sub_bodegas sb","bodega_principal bp");
      $this->db->join("bodega_principal bp", "sb.bodega_principal_id = bp.id");
      $this->db->join("subcentros sbc", "sb.subcentro_id = sbc.id");
      $this->db->join("materiasprimas_insumos mpi", "bp.materiaPrima_insumo_id = mpi.id");
      $this->db->join("unidades_medida um", "bp.unidad_medida_id = um.id");
      $this->db->where("sb.estado","1");
      $resultados = $this->db->get();
      if ($resultados->num_rows() > 0) {
        return $resultados->result();
      }else{
        return false;
      }
    }

    public function getInventarioSubBodegasPt()
    {
      $this->db->select("sb.*, p.lote as numLoteProduccion, p.fecha_vencimiento as fechaVencimientoProduccion, pc.nombre as nomProducto, sbc.nombre as subcentro");
      $this->db->from("sub_bodegas sb","producciones p");
      $this->db->join("producciones p", "sb.produccion_id = p.id");
      $this->db->join("productos_catalogo pc", "p.producto_id = pc.id");
      $this->db->join("subcentros sbc", "sb.subcentro_id = sbc.id");
      $this->db->where("sb.estado","1");
      $resultados = $this->db->get();
      if ($resultados->num_rows() > 0) {
        return $resultados->result();
      }else{
        return false;
      }
    }

    public function getInformeSalidas()
    {
        $this->db->select("sbp.*, bp.numero_lote as numeroLoteInformeSalida, p.fecha_fin as fechaSalida, p.lote as loteProduccion, mpi.nombre as nombreMpi, um.sigla as unidadMedida");
        $this->db->from("subbodegas_producciones sbp", "sub_bodegas sb", "bodega_principal bp");
        $this->db->join("producciones p", "sbp.produccion_id = p.id");
        $this->db->join("sub_bodegas sb", "sbp.sub_bodega_id = sb.id");
        $this->db->join("bodega_principal bp", "sb.bodega_principal_id = bp.id");
        $this->db->join("unidades_medida um", "bp.unidad_medida_id = um.id");
        $this->db->join("materiasprimas_insumos mpi", "bp.materiaPrima_insumo_id = mpi.id");        
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
        return $resultados->result();
        }else{
        return false;
        }
    }
}