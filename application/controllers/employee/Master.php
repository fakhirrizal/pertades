<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Data Fisioterapi */
	public function data_fisioterapi()
	{
		$data['parent'] = 'master';
		$data['child'] = 'master_fisioterapi';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Fisioterapi';
		$data['breadcrumbs3'] = '';
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/master/data_fisioterapi',$data);
		$this->load->view('employee/template/footer');
	}
	public function json_data_fisioterapi()
	{
		$get_data = $this->Main_model->getSelectedData('fisioterapi a', 'a.*',array('a.deleted' => '0'))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['alamat'] = $value->alamat;
			$isi['hp'] = $value->no_hp;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="kt-section__content">
				<div class="dropdown dropdown-inline">
					<button type="button" class="btn btn-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="flaticon-more-1"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#"><i class="la la-share"></i> Detil Data </a>
					</div>
				</div>
			</div>
								';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	/* Data Pasien */
	public function data_pasien()
	{
		$data['parent'] = 'master';
		$data['child'] = 'master_pasien';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Pasien';
		$data['breadcrumbs3'] = '';
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/master/data_pasien',$data);
		$this->load->view('employee/template/footer');
	}
	public function json_data_pasien()
	{
		$get_data = $this->Main_model->getSelectedData('pasien a', 'a.*',array('a.deleted' => '0'))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['no_pasien'] = $value->nomor_pasien;
			$isi['nama'] = $value->nama;
			$isi['alamat'] = $value->alamat;
			$isi['hp'] = $value->no_hp;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="kt-section__content">
				<div class="dropdown dropdown-inline">
					<button type="button" class="btn btn-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="flaticon-more-1"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="'.site_url('employee_side/detail_data_pasien/'.md5($value->id_pasien)).'"><i class="la la-share"></i> Detil Data </a>
						<a class="dropdown-item" href="'.site_url('employee_side/ubah_data_pasien/'.md5($value->id_pasien)).'"><i class="la la-edit"></i> Ubah Data </a>
						<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('employee_side/hapus_data_pasien/'.md5($value->id_pasien)).'" onclick="'.$return_on_click.'"><i class="la la-trash"></i> Hapus Data </a>
					</div>
				</div>
			</div>
								';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function tambah_data_pasien()
	{
		$data['parent'] = 'master';
		$data['child'] = 'master_pasien';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Pasien';
		$data['breadcrumbs3'] = 'Tambah Data';
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/master/tambah_data_pasien',$data);
		$this->load->view('employee/template/footer');
	}
	public function simpan_data_pasien()
	{
		$this->db->trans_start();
		$data_insert1 = array(
			'nomor_pasien' => $this->Main_model->get_nomor_pasien($this->input->post('nama')),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'nama_wali' => $this->input->post('nama_wali')
		);
		$this->Main_model->insertData('pasien',$data_insert1);
		// print_r($data_insert1);

		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data pasien (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."employee_side/tambah_data_pasien/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."employee_side/data_pasien'</script>";
		}
	}
	public function detail_data_pasien()
	{
		$data['parent'] = 'master';
		$data['child'] = 'master_pasien';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Pasien';
		$data['breadcrumbs3'] = 'Detail Data';
		$data['data_utama'] = $this->Main_model->getSelectedData('pasien a', 'a.*', array('md5(a.id_pasien)'=>$this->uri->segment(3)))->row();
		$data['data_pemeriksaan'] = $this->Main_model->getSelectedData('pemeriksaan a', 'a.*,b.nama', array('md5(a.id_pasien)'=>$this->uri->segment(3)), '', '', '', '', array(
			'table' => 'fisioterapi b',
			'on' => 'a.user_id=b.user_id',
			'pos' => 'LEFT'
		))->result();
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/master/detail_data_pasien',$data);
		$this->load->view('employee/template/footer');
	}
	public function ubah_data_pasien()
	{
		$data['parent'] = 'master';
		$data['child'] = 'master_pasien';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Pasien';
		$data['breadcrumbs3'] = 'Ubah Data';
		$data['data_utama'] = $this->Main_model->getSelectedData('pasien a', 'a.*', array('md5(a.id_pasien)'=>$this->uri->segment(3)))->row();
		$this->load->view('employee/template/header',$data);
		$this->load->view('employee/master/ubah_data_pasien',$data);
		$this->load->view('employee/template/footer');
	}
	public function perbarui_data_pasien()
	{
		$this->db->trans_start();
		$data_insert1 = array(
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'nama_wali' => $this->input->post('nama_wali')
		);
		$this->Main_model->updateData('pasien',$data_insert1,array('md5(id_pasien)'=>$this->input->post('id')));

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Mengubah data pasien (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."employee_side/ubah_data_pasien/".$this->input->post('id')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."employee_side/data_pasien/'</script>";
		}
	}
	public function hapus_data_pasien()
	{
		$this->db->trans_start();
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('pasien a', 'a.*',array('md5(a.id_pasien)'=>$this->uri->segment(3)))->row();
		$user_id = $get_data->id_pasien;
		$name = $get_data->nama;

		$this->Main_model->updateData('pasien',array('deleted'=>'1'),array('id_pasien'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Menghapus data pasien (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."employee_side/data_pasien/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."employee_side/data_pasien/'</script>";
		}
	}
}