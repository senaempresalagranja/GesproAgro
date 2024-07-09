<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosCatalogo_model extends CI_Model {

    public function getProductosCatalogos()
    {
        $this->db->select("pc.*,lp.nombre as lienaProduccion, um.sigla as unidadMedidaSigla, um.nombre_completo as unidadMedidaNombre, s.nombre as subcentroNombre, s.codigo as subcentroCodigo");
        $this->db->from("productos_catalogo pc");
        $this->db->join("linea_produccion lp", "pc.linea_produccion_id = lp.id");
        $this->db->join("unidades_medida um", "pc.unidad_medida_id = um.id");
        $this->db->join("subcentros s", "pc.subcentro_id = s.id");
        $this->db->where("pc.estado","1");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getProductosCatalogo($id)
    {
        $this->db->select("pc.*,lp.nombre as lienaProduccion, um.sigla as unidadMedidaSigla, um.nombre_completo as unidadMedidaNombre, s.nombre as subcentro");
        $this->db->from("productos_catalogo pc");
        $this->db->join("linea_produccion lp", "pc.linea_produccion_id = lp.id");
        $this->db->join("unidades_medida um", "pc.unidad_medida_id = um.id");
        $this->db->join("subcentros s", "pc.subcentro_id = s.id");
        $this->db->where("pc.id",$id);
        $this->db->where("pc.estado","1");
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function getLineaProduccion()
    {
		$resultados = $this->db->get("linea_produccion");
		return $resultados->result();
	}

    public function getUnidadesMedida()
    {
		$resultados = $this->db->get("unidades_medida");
		return $resultados->result();
    }
    
    public function getSubcentro()
    {
		$resultados = $this->db->get("subcentros");
		return $resultados->result();
	}

    public function save($data)
    {
        return $this->db->insert("productos_catalogo",$data);
    }

    public function update($id,$data)
    {
		$this->db->where("id",$id);
		return $this->db->update("productos_catalogo",$data);
	}

}