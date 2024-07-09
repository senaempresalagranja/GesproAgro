<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalPlanta_model extends CI_Model {

    public function getPerosonalPlanta()
    {
        $this->db->select("pp.*,c.nombre as cargo, td.sigla as tipoDocumentoSigla, td.nombre as tipoDocumentoNombre");
        $this->db->from("personal_planta pp");
        $this->db->join("cargos c", "pp.cargo_id = c.id");
        $this->db->join("tipo_documento td", "pp.tipo_documento_id = td.id");
        $this->db->where("pp.estado","1");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getCargos()
    {
		$resultados = $this->db->get("cargos");
		return $resultados->result();
    }
    
    public function getTipoDocumentos()
    {
		$resultados = $this->db->get("tipo_documento");
		return $resultados->result();
    }
    
    public function save($data)
    {
        return $this->db->insert("personal_planta",$data);
    }

    public function getPerosonaPlanta($id)
    {
        $this->db->select("pp.*,c.nombre as cargo, td.sigla as tipoDocumentoSigla, td.nombre as tipoDocumentoNombre");
        $this->db->from("personal_planta pp");
        $this->db->join("cargos c", "pp.cargo_id = c.id");
        $this->db->join("tipo_documento td", "pp.tipo_documento_id = td.id");
        $this->db->where("pp.id",$id);
        $this->db->where("pp.estado","1");
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function update($id,$data)
    {
		$this->db->where("id",$id);
		return $this->db->update("personal_planta",$data);
    }
}