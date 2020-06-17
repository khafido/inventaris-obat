<?php
class Pegawai extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_crud');
	}

	function index(){
		$data['pegawai'] = $this->m_crud->readByOrder('tbl_pegawai', array('pegawai_status'=>1), "pegawai_nama asc");
		$this->load->view('includes/v_header');
		$this->load->view('v_pegawai', $data);
		$this->load->view('includes/v_footer');
	}

	function form($action = null){
		$data['list'] = $this->m_crud->readBy('tbl_pegawai', array('pegawai_status'=>1));
		if($action == 'tambah'){
			$data['pegawai'] = null;
			// $this->m_crud->create('tbl_obat', $data);
		} else if($action == 'ubah'){
			$id 	= $this->uri->segment(4);
			$data['pegawai'] = $this->m_crud->readByOrder('tbl_pegawai', array('pegawai_id'=>$id,'pegawai_status'=>1), "pegawai_nama asc")[0];
		}
		// }
		$this->load->view('includes/v_header');
		$this->load->view('form_pegawai', $data);
		$this->load->view('includes/v_footer');
	}

	function tambah(){
		$data['pegawai_nama'] = $this->input->post('pnama');

		$data=$this->m_crud->create('tbl_pegawai', $data);

		if($data=='sukses'){
			redirect(base_url('pegawai'));
		}
	}

	function ubah(){
		$id 	= $this->input->post('id');
		$data['pegawai_nama'] = $this->input->post('pnama');

		$data = $this->m_crud->update('tbl_pegawai', $data, array('pegawai_id'=>$id));

		if($data=='sukses'){
			redirect(base_url('pegawai'));
		}
	}

	function delete($id){
		$data = $this->m_crud->hapus('tbl_pegawai', array('pegawai_id'=>$id));
		if($data=='sukses'){
			redirect(base_url('/pegawai'));
		}
	}
}
