<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MateriasPrimasInsumos_model extends CI_Model {

    public function getMateriasPrimasInsumos()
    {
        $this->db->select("mpi.*,c.nombre as clasificacion");
        $this->db->from("materiasPrimas_insumos mpi");
        $this->db->join("clasificaciones c", "mpi.clasificacion_id = c.id");
        $this->db->where("mpi.estado","1");
        $resultados = $this->db->get();
        return $resultados->result();
    }
    
    public function getClasificaciones()
    {
		$resultados = $this->db->get("clasificaciones");
		return $resultados->result();
    }    
  
    public function save($data)
    {
        return $this->db->insert("materiasPrimas_insumos",$data);
    }

    public function getMateriaPrimasInsumo($id)
    {
        $this->db->select("mpi.*,c.nombre as clasificacion");
        $this->db->from("materiasPrimas_insumos mpi");
        $this->db->join("clasificaciones c", "mpi.clasificacion_id = c.id");
        $this->db->where("mpi.id",$id);
        $this->db->where("mpi.estado","1");
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function getClacificaciones()
    {
		$resultados = $this->db->get("clasificaciones");
		return $resultados->result();
    }

    public function update($id,$data)
    {
		$this->db->where("id",$id);
		return $this->db->update("materiasPrimas_insumos",$data);
    }
}