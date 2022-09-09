<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* TOEFL UNIS
* Deky Alexander
* dekyalexander200@gmail.com
*/
class Cbt_tesgrup_model extends CI_Model{
	public $table = 'cbt_tesgrup';
	
	function __construct(){
        parent::__construct();
    }
	
    function save($data){
        $this->db->insert($this->table, $data);
    }
    
    function delete($kolom, $isi){
        $this->db->where($kolom, $isi)
                 ->delete($this->table);
    }
    
    function update($kolom, $isi, $data){
        $this->db->where($kolom, $isi)
                 ->update($this->table, $data);
    }
    
    function count_by_kolom($kolom, $isi){
        $this->db->select('COUNT(*) AS hasil')
                 ->where($kolom, $isi)
                 ->from($this->table);
        return $this->db->get();
    }

    function count_by_tes_and_group($tes, $group){
        $this->db->select('COUNT(*) AS hasil')
                 ->where('(tstgrp_tes_id="'.$tes.'" AND tstgrp_grup_id="'.$group.'" )')
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_kolom($kolom, $isi){
        $this->db->where($kolom, $isi)
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_kolom_limit($kolom, $isi, $limit){
        $this->db->where($kolom, $isi)
                 ->from($this->table)
				 ->limit($limit);
        return $this->db->get();
    }
	
	function get_datatable($start, $rows, $grup_id){
		$this->db->where('(tstgrp_grup_id="'.$grup_id.'" AND tes_begin_time<=NOW() AND tes_end_time>=NOW())')
                 ->from($this->table)
                 ->join('cbt_tes', 'cbt_tesgrup.tstgrp_tes_id = cbt_tes.tes_id')
                 ->order_by('tes_begin_time ASC, tes_nama ASC')
                 ->limit($rows, $start);
        return $this->db->get();
	}
    
    function get_datatable_count($grup_id){
		$this->db->select('COUNT(*) AS hasil')
                 ->where('(tstgrp_grup_id="'.$grup_id.'" AND tes_begin_time<=NOW() AND tes_end_time>=NOW())')
                 ->join('cbt_tes', 'cbt_tesgrup.tstgrp_tes_id = cbt_tes.tes_id')
                 ->from($this->table);
        return $this->db->get();
	}
}