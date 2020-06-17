<?php
class Rekam extends CI_Controller{
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
		$data['rekam'] = $this->m_crud->readBy('detail_rekam', array('rekam_status'=>1));
		$data['controller'] = $this;
		$this->load->view('includes/v_header');
		$this->load->view('v_rekam', $data);
		$this->load->view('includes/v_footer');
	}

	function form($action = null){
		$data['pegawai'] = $this->m_crud->readBy('tbl_pegawai', array('pegawai_status'=>1));
		// $data['list'] = $this->m_crud->readBy('tbl_obat', array('obat_status'=>1));
		$data['list'] = $this->m_crud->selectDistinctOrder('tbl_obat', "obat_nama", array('obat_status'=>1), "obat_nama asc")->result();
		$data['listobat'] = $this->m_crud->readBy('detail_obat', array('obat_status'=>1));

		$this->load->view('includes/v_header');
		$this->load->view('form_rekam', $data);
		$this->load->view('includes/v_footer', $data);
	}

	function tambah(){
		// date_default_timezone_set('Asia/Jakarta');
		// $data['rekam_id'] 	= date('YmdHis');
		// $data['rekam_keluhan'] 	= $this->input->post('keluhan');
		// $data['rekam_diagnosa'] 	= $this->input->post('diagnosa');
		// $data['rekam_pegawaiid'] = $this->input->post('pegawai');
		// $data['rekam_tgl'] = $this->input->post('tglinput');
		//
		// if($data['rekam_pegawaiid']=="0"){
		// 	$pegawai['pegawai_nama'] = $this->input->post('pnama');
		// 	$data['rekam_pegawaiid'] = $this->m_crud->createID('tbl_pegawai', $pegawai);
		// }
		//
		// $rekam = $this->m_crud->create('tbl_rekam', $data);

		// if($rekam=='sukses'){
			// $rekamid = $data['rekam_id'];

			$data_p = json_decode($this->input->post('daftarobat'));
			$data_p = $this->input->post('daftarobat');


			// $datap = array();
			// if($data_p!=NULL){
			// 	foreach($data_p as $val){
			// 		array_push($datap, array("keluar_rekamid"=>$rekamid,"keluar_obatid"=>$val->id ,"keluar_jumlah"=>$val->qty));
			// 		$this->m_crud->update('tbl_obat', array("obat_jumlah"=>$val->stok - $val->qty), array("obat_kode"=>$val->id));
			// 	}
			// 	$data = $this->m_crud->createBatch('tbl_obatkeluar', $datap);
			// }

			// if($rekam=='sukses'){
				var_dump($data_p);
				// redirect(base_url('rekam'));
			// }
		// }

		// } else {
		// 	redirect(base_url('/obat/form/tambah'));
		// }
	}

	function getObat($id){
		$obat = $this->m_crud->readBy('detail_obatkeluar', array('keluar_rekamid'=>$id, 'keluar_status'=>1));
		return $obat;
	}

	function delete($id){
		$data['rekam_status'] = 0;
		$data = $this->m_crud->update('tbl_rekam', $data, array('rekam_id'=>$id));
		if($data=='sukses'){
			redirect(base_url('rekam'));
		}
	}

	function deletek($rid, $oid){
		$data['keluar_status'] = 0;
		$data = $this->m_crud->update('detail_rekamobat', $data, array('keluar_obatid'=>$oid, 'rekam_id'=>$rid));
		if($data=='sukses'){
			redirect(base_url('rekam/keluar'));
		}
	}

	function keluar(){
		$data['rekam'] = $this->m_crud->readBy('detail_rekamobat', array('rekam_status'=>1, 'keluar_status'=>1));
		$this->load->view('includes/v_header');
		$this->load->view('v_rekamobat', $data);
		$this->load->view('includes/v_footer');
	}

	function custom($table, $kolom){
		$data['title'] = 'Daftar Obat';
		$start = $this->input->post("start_date");
		$end = $this->input->post("end_date");
		$data['start'] = $start;
		$data['end'] = $end;
		$data['rekam'] = $this->m_crud->sort($start, $end, $table, $kolom);
		$data['controller'] = $this;
		$this->load->view('includes/v_header');
		$this->load->view('v_rekam', $data);
		$this->load->view('includes/v_footer');
	}

	function customkeluar($table, $kolom){
		$data['title'] = 'Daftar Obat';
		$start = $this->input->post("start_date");
		$end = $this->input->post("end_date");
		$data['start'] = $start;
		$data['end'] = $end;
		$data['rekam'] = $this->m_crud->sort($start, $end, $table, $kolom);
		$data['controller'] = $this;
		$this->load->view('includes/v_header');
		$this->load->view('v_rekamobat', $data);
		$this->load->view('includes/v_footer');
	}
}
