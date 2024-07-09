<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producciones_model extends CI_Model {

    public function getProducciones()
    {
        $this->db->select("p.*, pc.nombre as productoCatalogo, te.nombre as tipoEncargado");
        $this->db->from("producciones p");
        $this->db->join("productos_catalogo pc", "p.producto_id = pc.id");
        $this->db->join("tipo_encargado te", "p.tipo_encargado_id = te.id");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getTipoEncargados()
    {
        $resultados = $this->db->get("tipo_encargado");
        return $resultados->result();
    }

    public function getInstructorEncargado($valorEncargado)
    {
        $this->db->select("pp.id, pp.nombre_completo as label, c.nombre as cargo");
        $this->db->from("personal_planta pp");
        $this->db->join("cargos c", "pp.cargo_id = c.id");
        $this->db->like("nombre_completo",$valorEncargado);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }
    
    public function getSubBodegasAutocomplete($valor,$subBodega)
    {
        $this->db->select("sb.id, sb.bodega_principal_id, sb.stock_subBodega, sb.precio_unitario, sb.subcentro_id, sb.estado, bp.fecha_vencimiento as fechaVencimientoBp, bp.numero_lote as numeroLoteBp, CONCAT(bp.numero_lote,' || ',mpi.nombre,' || ',bp.fecha_vencimiento) as label, mpi.nombre as nombreMpi, um.sigla as unidadMedida");
        $this->db->from("sub_bodegas sb", "bodega_principal bp");
        $this->db->join("bodega_principal bp", "sb.bodega_principal_id = bp.id");
        $this->db->join("subcentros sbc", "sb.subcentro_id = sbc.id");
        $this->db->join("unidades_medida um", "bp.unidad_medida_id = um.id");
        $this->db->join("materiasprimas_insumos mpi", "bp.materiaPrima_insumo_id = mpi.id");
        $this->db->order_by("bp.fecha_vencimiento","ASC");
        $this->db->where("sb.estado","1");
        $this->db->where("sb.subcentro_id",$subBodega);
        $this->db->like("mpi.nombre",$valor);        
        $resultados = $this->db->get();
        return $resultados->result_array();
    }

    public function save($data)
    {
        return $this->db->insert("producciones",$data);
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function save_subbodegas_producciones($data)
    {
        return $this->db->insert("subbodegas_producciones",$data);
    }

    public function getSubBodegaMpi($id)
    {
        $this->db->select("sb.*, bp.id as idBp, mpi.id as idMpi,");
        $this->db->from("sub_bodegas sb", "bodega_principal bp");
        $this->db->join("bodega_principal bp", "sb.bodega_principal_id = bp.id");
        $this->db->join("materiasprimas_insumos mpi", "bp.materiaPrima_insumo_id = mpi.id");
        $this->db->where("sb.estado","1");
        $this->db->where("sb.id",$id);        
        $resultados = $this->db->get();
        return $resultados->row();
    }

    public function getSubBodega($id)
    {
        $this->db->select("sb.*");
        $this->db->from("sub_bodegas sb");
        $this->db->where("sb.id",$id);
        $this->db->where("sb.estado","1");
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function updateSubBodega($idSubBodega,$data)
    {
		$this->db->where("id",$idSubBodega);
		return $this->db->update("sub_bodegas",$data);
    }

    public function getProduccion($id)
    {
        $this->db->select("p.*, pc.nombre as productoCatalogo, pc.presentacion, pc.precio_venta, te.nombre as tipoEncargado, s.nombre as subcentro, s.codigo, um.sigla as unidadMedida, pp.nombre_completo as instructorEncargado");
        $this->db->from("producciones p","productos_catalogo pc");
        $this->db->join("personal_planta pp", "p.personal_planta_id = pp.id");
        $this->db->join("productos_catalogo pc", "p.producto_id = pc.id");
        $this->db->join("unidades_medida um", "pc.unidad_medida_id = um.id");
        $this->db->join("tipo_encargado te", "p.tipo_encargado_id = te.id");
        $this->db->join("subcentros s", "pc.subcentro_id = s.id");
        $this->db->where("p.id",$id);
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function getDestino()
    {
        $this->db->order_by("nombre","ASC");
        $resultados = $this->db->get("destinos");
        return $resultados->result();
    }

    public function getOperacion($id)
    {
        $this->db->where("destino_id",$id);
        $this->db->order_by("nombre","ASC");
        $resultados = $this->db->get("operaciones");
        $output = "<option value''>Seleccione...</option>";
        foreach($resultados->result() as $operacion){
            $output .= '<option value"'.$operacion->id.'">'.$operacion->id."-".$operacion->nombre.'</option>';
        }
        return $output;
    }

    public function saveLiberacion($data)
    {
      return $this->db->insert("liberaciones",$data);
    }

    public function getProduccionActual($idProduccion)
    {
      $this->db->where("id",$idProduccion);
      $resultado = $this->db->get("producciones");
      return $resultado->row();
    }

    public function updateProduccion($idProduccion,$data)
    {
      $this->db->where("id",$idProduccion);
      $this->db->update("producciones",$data);
    }

    public function getSubbodegas_producciones($id)
    {
        $this->db->select("sbp.*, bp.numero_lote as numeroLoteBp, bp.fecha_vencimiento as fechaVencimientoBp, mpi.nombre as nombreMpi, um.sigla as unidadMedida");
        $this->db->from("subbodegas_producciones sbp", "sub_bodegas sb", "bodega_principal bp");
        $this->db->join("sub_bodegas sb", "sbp.sub_bodega_id = sb.id");
        $this->db->join("bodega_principal bp", "sb.bodega_principal_id = bp.id");
        $this->db->join("unidades_medida um", "bp.unidad_medida_id = um.id");
        $this->db->join("materiasprimas_insumos mpi", "bp.materiaPrima_insumo_id = mpi.id");
        $this->db->where("sbp.produccion_id",$id);        
        $resultados = $this->db->get();
        return $resultados->result();
    }
    
    public function getLiberacion($id)
    {
        $this->db->select("l.*, o.nombre as operacion, d.nombre as destino");
        $this->db->from("liberaciones l","operaciones o");
        $this->db->join("operaciones o", "l.operacion_id = o.id");
        $this->db->join("destinos d", "o.destino_id = d.id");
        $this->db->where("l.produccion_id",$id);
        $resultados = $this->db->get();
        if ($resultados->num_rows() >0 ) {
            return $resultados->result();
        } else {
            return false;
        }
    }

    public function getAnalisisSensorialView($id)
    {
        $this->db->select("asp.*, ansen.puntuacion_final, ansen.analisis_resultado, ansen.aceptacion, ansen.evaluador");
        $this->db->from("analisissensorial_producciones asp");
        $this->db->join("analisis_sensorial ansen", "asp.analisisSensorial_id = ansen.id");
        $this->db->where("asp.produccion_id",$id);
        $resultado = $this->db->get();
        if ($resultado->num_rows() >0 ) {
            return $resultado->row();
        } else {
            return false;
        }
    }

    public function getInformeProduccion()
    {
        $this->db->select("p.*, pc.nombre as productoCatalogo, pc.presentacion, pc.precio_venta, te.nombre as tipoEncargado, s.nombre as subcentro, um.sigla as unidadMedida, pp.nombre_completo as instructorEncargado");
        $this->db->from("producciones p","productos_catalogo pc");
        $this->db->join("personal_planta pp", "p.personal_planta_id = pp.id");
        $this->db->join("productos_catalogo pc", "p.producto_id = pc.id");
        $this->db->join("tipo_encargado te", "p.tipo_encargado_id = te.id");
        $this->db->join("subcentros s", "pc.subcentro_id = s.id");
        $this->db->join("unidades_medida um", "pc.unidad_medida_id = um.id");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getReporteLiberacion()
    {
        $this->db->select("l.*, p.id as numConsecutivo, p.lote as loteProduccion, pc.nombre as productoCatalogo, s.nombre as subcentro, o.nombre as operacion, d.nombre as destino");
        $this->db->from("liberaciones l","producciones p","operaciones o");
        $this->db->join("producciones p", "l.produccion_id = p.id");
        $this->db->join("productos_catalogo pc", "p.producto_id = pc.id");
        $this->db->join("subcentros s", "pc.subcentro_id = s.id");
        $this->db->join("operaciones o", "l.operacion_id = o.id");
        $this->db->join("destinos d", "o.destino_id = d.id");
        $resultados = $this->db->get();
        if ($resultados->num_rows() >0 ) {
            return $resultados->result();
        } else {
            return false;
        }
    }

    public function getReporteAnalisisSensorial()
    {
        $this->db->select("as.id as idAs, as.fecha, as.puntuacion_final, as.analisis_resultado, as.aceptacion, as.evaluador, asp.caracteristica, asp.atributo, asp.puntuacion, p.id as consecutivo, p.lote, pc.nombre as nomPc, sbc.codigo");
        $this->db->from("analisis_sensorial as","analisissensorial_producciones asp","producciones p","productos_catalogo pc");
        $this->db->join("analisissensorial_producciones asp", "as.id = asp.analisisSensorial_id");
        $this->db->join("producciones p", "asp.produccion_id = p.id");
        $this->db->join("productos_catalogo pc", "p.producto_id = pc.id");
        $this->db->join("subcentros sbc", "pc.subcentro_id = sbc.id");
        $resultados = $this->db->get();
        if ($resultados->num_rows() >0 ) {
            return $resultados->result();
        } else {
            return false;
        }
    }
 
    public function saveAnalisisSensorial($data)
    {
      return $this->db->insert("analisis_sensorial",$data);
    }

    public function lastAsID()
    {
        return $this->db->insert_id();
    }

    public function save_analisissensorial_producciones($data)
    {
      return $this->db->insert("analisissensorial_producciones",$data);
    }

}