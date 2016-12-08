<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    function login($tabel, $where=null)
	{
		$this->db->select('*');
		$this->db->from($tabel);		
		if ($where !== null)
			$this->db->where($where);
		$this->db->limit(1);		 
		$query = $this -> db -> get();		 
		if($query->num_rows() == 1)
		 {
			 return $query->result();
		 }
		 else
		 {
			 return false;
		 }
	}
	function edit($q, $id, $tabel, $data) {
		$this->db->where($q, $id);
		$q = $this->db->update($tabel, $data);
		return $q;
	}
	function insert($tabel, $param) {
		$q = $this->db->insert($tabel, $param);
		return $q;
	}
	function hapus($tabel, $where)
	{	
		$this->db->delete($tabel, $where); 
	}
	
	function data_by_id($tabel, $limit, $offset, $ordercol, $orderby = 'DESC', $select, $where, $join)
	{		
		$this->db->select($select);
		//$this->db->select("DATE_FORMAT( date, '%d.%m.%Y' ) as date_human",FALSE);
		//$this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",FALSE);		
		$this->db->from($tabel);
		if ($join !== null){
		 foreach($join as $joinRow):
                  if(!empty($joinRow['joinType'])){					  
                        $this->db->join($joinRow['table'],$joinRow['tableJoin'],$joinRow['joinType']);}
                  else{ $this->db->join($joinRow['table'],$joinRow['tableJoin']);                     }  
                endforeach;
		}
		if ($where !== null)
			$this->db->where($where);
		$this->db->order_by($ordercol,$orderby);
		$this->db->limit($limit,$offset);
		$query = $this->db->get();		
		if ( $query->num_rows() > 0 )
		{
			$row = $query->result();//$query->row_array();
			return $row;
		}		
	}   
	
	function get_mapel()
	{
		$this->db->select('m.*, k.keterangan');
		$this->db->from('mapel m'); 
		$this->db->join('kategori_mapel k', 'm.kategori=k.id', 'left');
		$this->db->order_by('m.nama_mapel','asc');         
		$query = $this->db->get(); 
		if($query->num_rows() != 0)
		{
			return $query->result();//return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	
	function get_kelasguru()
	{
		$this->db->select('gk.*, g.nama_guru, k.nama_kelas');
		$this->db->from('guru_kelas gk'); 
		$this->db->join('guru g', 'gk.nip=g.nip', 'left');
		$this->db->join('kelas k', 'gk.id_kelas=k.id_kelas', 'left');
		$this->db->order_by('gk.id_guru_kelas','asc');         
		$query = $this->db->get(); 
		if($query->num_rows() != 0)
		{
			return $query->result();//return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	
	function get_kelasdidik()
	{
		$this->db->select('ka.*, p.nama_lengkap, k.nama_kelas');
		$this->db->from('kelas_anakdidik ka'); 
		$this->db->join('peserta_didik p', 'ka.no_induk=p.id_peserta', 'left');
		$this->db->join('kelas k', 'ka.id_kelas=k.id_kelas', 'left');
		$this->db->order_by('ka.tahun_ajaran','asc');         
		$query = $this->db->get(); 
		if($query->num_rows() > 0)
		{
			return $query->result();//return $query->result_array();
		}
		else
			return false;
	}
	
	function get_nilai()
	{
		$this->db->select('n.*, s.nama_lengkap');
		$this->db->from('nilai n'); 
		$this->db->join('peserta_didik s', 'n.no_induk=s.no_induk', 'left');
		$this->db->order_by('n.tahun_ajaran','asc');         
		$query = $this->db->get(); 
		if($query->num_rows() > 0)
		{
			return $query->result();//return $query->result_array();
		}
		else
		return false;
	}
	function get_last_nip()
	{	
		$tahun = date("Y");		
		$query = $this->db->query("SELECT MAX(nip) as max_id FROM guru"); 
		$row = $query->row_array();
		$max_id = $row['max_id']; 
		$max_id1 =(int) substr($max_id,4,7);		
		$max = $tahun.sprintf("%04s",$max_id1 +1);
		return $max;
	}
	
	function get_data($tabel, $where)
	{
		$this->db->select('*');
		$this->db->from($tabel);
		if ($where !== null)
			$this->db->where($where);
		$query = $this->db->get();		
		if ( $query->num_rows() > 0 )
		{
			return $query->result();//$query->row_array();
		}
		
	} 
	function get_data_single($tabel, $where)
	{
		$this->db->select('*');
		$this->db->from($tabel);
		if ($where !== null)
			$this->db->where($where);
		$query = $this->db->get();		
		if ( $query->num_rows() > 0 )
		{
			return $query->row();//$query->row_array();
		}
		
	} 
	
	public function get_count_record($table, $where="")
    {   
		$query = $this->db->get($table);
		return $query->num_rows();				
		
    }
	
	
}
