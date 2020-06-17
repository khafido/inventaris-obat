<?php
class Obat extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_crud');
	}
	// function index(){
	// 	$this->load->view('includes/v_header');
	// 	$this->load->view('product_view');
	// 	$this->load->view('includes/v_footer');
	// }

	function index(){
		$data['title'] = 'Obat Tersedia';
		// $kedaluwarsa = $this->m_crud->readBy('obat_kedaluwarsa', array('obat_status'=>1));
		$obat = $this->m_crud->readBy('detail_obat', array('obat_status'=>1));
		// $data['obat'] = array_merge($kedaluwarsa, $obat);
		$data['obat'] = $obat;
		$this->load->view('includes/v_header');
		$this->load->view('v_obat', $data);
		$this->load->view('includes/v_footer');
	}

	function ada(){
				redirect(base_url('obat'));
	}

	function kedaluwarsa(){
		$data['title'] = 'Obat Kedaluwarsa';
		$kedaluwarsa = $this->m_crud->readBy('obat_kedaluwarsa', array('obat_status'=>1));
		// $obat = $this->m_crud->readBy('detail_obat', array('obat_status'=>1));
		// $data['obat'] = array_merge($kedaluwarsa, $obat);
		$data['obat'] = $kedaluwarsa;
		$this->load->view('includes/v_header');
		$this->load->view('v_obat_kedaluwarsa', $data);
		$this->load->view('includes/v_footer');
	}

	function form($action = null){
		$data = null;
		// if($action!=null){
		$data['jenis'] = $this->m_crud->readBy('tbl_jenis', array('jenis_status'=>1));
		$data['letak'] = $this->m_crud->readBy('tbl_letak', array('letak_status'=>1));
		$data['satuan'] = $this->m_crud->readBy('tbl_satuan', array('satuan_status'=>1));
		// $data['list'] = $this->m_crud->readBy('tbl_obat', array('obat_status'=>1));
		$data['list'] = $this->m_crud->selectDistinctOrder('tbl_obat', "obat_nama", array('obat_status'=>1), "obat_nama asc")->result();

		if($action == 'tambah'){
			$data['obat'] = null;
			// $this->m_crud->create('tbl_obat', $data);
		} else if($action == 'ubah'){
			$id 	= $this->uri->segment(4);
			$data['obat'] = $this->m_crud->readBy('detail_obat', array('obat_kode'=>$id))[0];
		}
		// }
		$this->load->view('includes/v_header');
		$this->load->view('form_obat', $data);
		$this->load->view('includes/v_footer');
	}

	function tambah(){
		// $this->form_validation->set_rules('kode', 'Kode','required|is_unique[tbl_obat.obat_kode]');
		// $this->form_validation->set_rules('nama', 'Nama','required');
		// $this->form_validation->set_rules('kedaluwarsa','kedaluwarsa','required');
		// $this->form_validation->set_rules('jenis','PASSWORD','required');
		// $this->form_validation->set_rules('letak','PASSWORD CONFIRMATION','required');
		// if($this->form_validation->run() == TRUE) {

		// $data['obat_kode'] 	= $this->input->post('kode');

		$data['obat_nama'] 	= $this->input->post('namao');
		$data['obat_tglkedaluwarsa'] = $this->input->post('kedaluwarsa');
		$data['obat_tglinput'] = $this->input->post('tglinput');
		$data['obat_jenis'] = $this->input->post('jenis');
		$data['obat_letak'] = $this->input->post('letak');
		$data['obat_satuan'] = $this->input->post('satuan');
		$data['obat_jumlah'] = preg_replace('/\D/', '', $this->input->post('jumlah'));

		if($data['obat_jenis']=="0"){
			$jenis['jenis_nama'] = $this->input->post('jnama');
			$data['obat_jenis'] = $this->m_crud->createID('tbl_jenis', $jenis);
		}
		if($data['obat_satuan']=="0"){
			$satuan['satuan_nama'] = $this->input->post('snama');
			$data['obat_satuan'] = $this->m_crud->createID('tbl_satuan', $satuan);
		}
		if($data['obat_letak']=="0"){
			$letak['letak_nama'] = $this->input->post('lnama');
			$data['obat_letak'] = $this->m_crud->createID('tbl_letak', $letak);
		}

		$data['obat_tglinput'] = $this->input->post('tglinput');

		$data=$this->m_crud->create('tbl_obat', $data);

		if($data=='sukses'){
			redirect(base_url('obat'));
		}

		// } else {
		// 	redirect(base_url('/obat/form/tambah'));
		// }
	}

	function ubah(){
		$id 	= $this->input->post('id');

		// $data['obat_kode'] 	= $this->input->post('kode');
		$data['obat_nama'] 	= $this->input->post('namao');
		$data['obat_tglkedaluwarsa'] = $this->input->post('kedaluwarsa');
		$data['obat_jenis'] = $this->input->post('jenis');
		$data['obat_letak'] = $this->input->post('letak');
		$data['obat_jumlah'] = preg_replace('/\D/', '', $this->input->post('jumlah'));

		if($data['obat_jenis']=="0"){
			$jenis['jenis_nama'] = $this->input->post('jnama');
			$data['obat_jenis'] = $this->m_crud->createID('tbl_jenis', $jenis);
		}
		if($data['obat_satuan']=="0"){
			$satuan['satuan_nama'] = $this->input->post('snama');
			$data['obat_satuan'] = $this->m_crud->createID('tbl_satuan', $satuan);
		}
		if($data['obat_letak']=="0"){
			$letak['letak_nama'] = $this->input->post('lnama');
			$data['obat_letak'] = $this->m_crud->createID('tbl_letak', $letak);
		}
		$data['obat_tglinput'] = $this->input->post('tglinput');
		$data = $this->m_crud->update('tbl_obat', $data, array('obat_kode'=>$id));

		if($data=='sukses'){
			redirect(base_url('obat'));
		}
	}

	function delete($id){
		$data['obat_status'] = 0;
		$data = $this->m_crud->update('tbl_obat', $data, array('obat_kode'=>$id));
		if($data=='sukses'){
			redirect(base_url('obat'));
		}
	}

	function deletes($id){
		$data['obat_status'] = 0;
		$data = $this->m_crud->update('tbl_obatstatis', $data, array('obat_kode'=>$id));
		if($data=='sukses'){
			redirect(base_url('obat/statis'));
		}
	}

	function hpsKedaluwarsa(){
		$data['obat_status'] = 0;
		$data = $this->m_crud->update('obat_kedaluwarsa', $data, array('obat_status'=>1));
		if($data=='sukses'){
			redirect(base_url('obat/kedaluwarsa'));
		}
	}

	function statis(){
		$data['title'] = 'Obat Statis';
		// $kedaluwarsa = $this->m_crud->readBy('obat_kedaluwarsa', array('obat_status'=>1));
		$obat = $this->m_crud->readBy('detail_obatstatis', array('obat_status'=>1));
		// $data['obat'] = array_merge($kedaluwarsa, $obat);
		$data['obat'] = $obat;
		$this->load->view('includes/v_header');
		$this->load->view('v_obat_statis', $data);
		$this->load->view('includes/v_footer');
	}

	function keluar(){
		$data['title'] = 'Obat Keluar';
		$data['redirect'] = 'Obat Keluar';
		$obat = $this->m_crud->read('detail_obatkeluar');
		$data['obat'] = $obat;
		$this->load->view('includes/v_header');
		$this->load->view('v_obatkeluar', $data);
		$this->load->view('includes/v_footer');
	}

	function custom($table, $kolom){
		$data['title'] = 'Obat Keluar';
		$start = $this->input->post("start_date");
		$end = $this->input->post("end_date");
		$data['start'] = $start;
		$data['end'] = $end;
		$data['obat'] = $this->m_crud->sort($start, $end, $table, $kolom);
		$this->load->view('includes/v_header');
		$this->load->view('v_obatkeluar', $data);
		$this->load->view('includes/v_footer');
	}
}
