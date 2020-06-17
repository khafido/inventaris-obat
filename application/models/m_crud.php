<?php
class M_crud extends CI_Model{

	function read($table){
		$hasil=$this->db->get($table);
		return $hasil->result();
	}

	function readBy($table, $where){
		$this->db->where($where);
		$hasil=$this->db->get($table);
		return $hasil->result();
	}

	function readByOrder($table, $where, $order){
		$this->db->where($where);
		$this->db->order_by($order);
		$hasil=$this->db->get($table);
		return $hasil->result();
	}

	function create($table, $data){
		$result = $this->db->insert($table, $data);
		if($result){
			return 'sukses';
		} else {
			return 'gagal';
		}
	}

	function createID($table, $data){
		$result = $this->db->insert($table, $data);
		if($result){
			return $this->db->insert_id();
		} else {
			return 'gagal';
		}
	}

	function createBatch($table, $data){
		$result = $this->db->insert_batch($table, $data);
		if($result){
		    return 'sukses';
		}
		return 'gagal';
	}

	function update($table, $data, $where){
		$this->db->set($data);
		$this->db->where($where);
		$result = $this->db->update($table);

		if($result){
			return 'sukses';
		} else {
			return 'gagal';
		}
	}

	function selectDistinctOrder($table, $kolom, $where, $order){
		// $this->db->distinct();
		$this->db->select("distinct($kolom), $kolom");
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($order);
		$hasil = $this->db->get();
		return $hasil;
	}

	function hapus($table, $where){
		$this->db->where($where);
		$result=$this->db->delete($table);
		if($result){
			return 'sukses';
		}
	}

	function sort($start, $end, $table, $column){
		$this->db->where("$column >=", $start);
		$this->db->where("$column <=", $end);
		$this->db->where("rekam_status", 1);
		$hasil=$this->db->get($table);
		return $hasil->result();
	}
}
