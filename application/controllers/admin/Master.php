<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Regional */
	public function regional()
	{
		$data['parent'] = 'master';
		$data['child'] = 'regional';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Master';
		$data['breadcrumbs2'] = 'Regional';
		$data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/regional',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_data_regional()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('regional a', 'a.*,b.nm_provinsi', '', '', '', '', '', array(
			'table' => 'provinsi b',
			'on' => 'a.id_provinsi=b.id_provinsi',
			'pos' => 'LEFT'
		))->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['regional'] = $value->regional;
			$isi['provinsi'] = $value->nm_provinsi;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_regional/'.md5($value->id_regional).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_regional/'.md5($value->id_regional).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
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
	public function tambah_data_regional()
	{
		$data['parent'] = 'master';
		$data['child'] = 'regional';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Data Regional';
		$data['breadcrumbs3'] = 'Tambah Data';
		$data['provinsi'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/tambah_data_regional',$data);
		$this->load->view('admin/template/footer');
	}
	public function simpan_data_regional()
	{
		$cek = $this->Main_model->getSelectedData('regional a', 'a.*', array('a.regional'=>$this->input->post('regional'),'a.id_provinsi'=>$this->input->post('id_provinsi')))->result();
		if($cek==NULL){
			$this->db->trans_start();
			$data_insert1 = array(
				'regional' => $this->input->post('regional'),
				'id_provinsi' => $this->input->post('id_provinsi')
			);
			$this->Main_model->insertData('regional',$data_insert1);
			// print_r($data_insert1);
			$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data regional (".$this->input->post('regional').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/tambah_data_regional/'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/regional'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Duplikat regional.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_regional/'</script>";
		}
	}
	public function ubah_data_regional()
	{
		$data['parent'] = 'master';
		$data['child'] = 'regional';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Data Regional';
		$data['breadcrumbs3'] = 'Ubah Data';
		$data['provinsi'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$data['data_utama'] = $this->Main_model->getSelectedData('regional a', 'a.*', array('md5(a.id_regional)'=>$this->uri->segment(3)))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/ubah_data_regional',$data);
		$this->load->view('admin/template/footer');
	}
	public function perbarui_data_regional()
	{
		$cek = $this->db->query("SELECT a.* FROM regional a WHERE md5(a.id_regional) NOT IN ('".$this->input->post('id_regional')."') AND a.regional='".$this->input->post('regional')."' AND a.id_provinsi='".$this->input->post('id_provinsi')."'")->result();
		if($cek==NULL){
			$this->db->trans_start();
			$data_insert1 = array(
				'regional' => $this->input->post('regional'),
				'id_provinsi' => $this->input->post('id_provinsi')
			);
			$this->Main_model->updateData('regional',$data_insert1,array('md5(id_regional)'=>$this->input->post('id_regional')));
			// print_r($data_insert1);
			$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Mengubah data regional (".$this->input->post('regional').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/ubah_data_regional/".$this->input->post('id_regional')."'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/regional'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Duplikat regional.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_regional/".$this->input->post('id_regional')."'</script>";
		}
	}
	public function hapus_data_regional()
	{
		$this->db->trans_start();
		$id_regional = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('regional a', 'a.*', array('md5(a.id_regional)'=>$this->uri->segment(3)))->row();
		$id_regional = $get_data->id_regional;
		$name = $get_data->regional;

		$this->Main_model->deleteData('regional', array('id_regional'=>$id_regional));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Menghapus data regional (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/regional/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/regional/'</script>";
		}
	}
	/* Persentase */
	public function persentase()
	{
		$data['parent'] = 'master';
		$data['child'] = 'percentage';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Master';
		$data['breadcrumbs2'] = 'Persentase';
		$data['breadcrumbs3'] = '';
		$data['role'] = $this->Main_model->getSelectedData('user_role a', 'a.*,b.persentase', array('a.bagi_hasil'=>'1','b.is_active'=>'1'), '', '', '', '', array(
			'table' => 'persentase b',
			'on' => 'a.id=b.role_id',
			'pos' => 'LEFT'
		))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/persentase',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_data_persentase()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('persentase a', 'a.*', '', 'a.id_persentase DESC', '', '', 'a.id_persentase')->result();
		foreach ($get_data as $key => $value) {
			$gm = 0;
			$tl = 0;
			$sitac = 0;
			$investor = 0;
			$bumdesa = 0;
			$spb = 0;
			$get_data_detail = $this->Main_model->getSelectedData('persentase a', 'a.*', array('a.id_persentase'=>$value->id_persentase))->result();
			foreach ($get_data_detail as $key => $row) {
				if($row->role_id=='2'){
					$gm = $row->persentase;
				}elseif($row->role_id=='3'){
					$tl = $row->persentase;
				}elseif($row->role_id=='4'){
					$sitac = $row->persentase;
				}elseif($row->role_id=='5'){
					$investor = $row->persentase;
				}elseif($row->role_id=='6'){
					$bumdesa = $row->persentase;
				}elseif($row->role_id=='7'){
					$spb = $row->persentase;
				}
			}
			$isi['gm'] = $gm.'%';
			$isi['tl'] = $tl.'%';
			$isi['sitac'] = $sitac.'%';
			$isi['investor'] = $investor.'%';
			$isi['bumdesa'] = $bumdesa.'%';
			$isi['spb'] = $spb.'%';
			$isi['tgl'] = $this->Main_model->convert_tanggal($value->created_at);
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function simpan_persentase()
	{
		$role = $this->Main_model->getSelectedData('user_role a', 'a.*', array('a.bagi_hasil'=>'1'))->result();
		$total = 0;
		foreach ($role as $key => $value) {
			$name = $value->id.'_persentase';
			$total += $this->input->post($name);
		}
		if($total==100){
			$this->db->trans_start();
			$this->Main_model->updateData('persentase',array('is_active'=>'0'),array('is_active'=>'1'));
			$get_last_id = $this->Main_model->getLastID('persentase','id_persentase');
			$new_id = $get_last_id['id_persentase']+1;
			foreach ($role as $key => $value) {
				$name = $value->id.'_persentase';
				$data_insert1 = array(
					'id_persentase' => $new_id,
					'role_id' => $value->id,
					'persentase' => $this->input->post($name),
					'created_at' => date('Y-m-d'),
					'is_active' => '1'
				);
				$this->Main_model->insertData('persentase',$data_insert1);
				// print_r($data_insert1);
			}
	
			$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data pengaturan bagi hasil",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/persentase/'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/persentase'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/persentase/'</script>";
			// echo $total;
		}
	}
	/* Data Pengguna */
	public function data_pengguna()
	{
		$data['parent'] = 'master';
		$data['child'] = 'user';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Pengguna';
		$data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/data_pengguna',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_data_pengguna_role_1()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('user_gm a', 'a.*')->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['alamat'] = $value->alamat;
			$isi['no_hp'] = $value->no_hp;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
					<hr>
					<a class="dropdown-item" href="'.base_url().'admin_side/atur_ulang_kata_sandi_akun_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Atur Ulang Kata Sandi"><i class="ik ik-refresh-ccw"></i> Atur Ulang Kata Sandi</a>
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
	public function json_data_pengguna_role_2()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('user_tl a', 'a.*,b.regional', '', '', '', '', '', array(
			'table' => 'regional b',
			'on' => 'a.id_regional=b.id_regional',
			'pos' => 'LEFT'
		))->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['alamat'] = $value->alamat;
			$isi['no_hp'] = $value->no_hp;
			$isi['regional'] = $value->regional;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
					<hr>
					<a class="dropdown-item" href="'.base_url().'admin_side/atur_ulang_kata_sandi_akun_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Atur Ulang Kata Sandi"><i class="ik ik-refresh-ccw"></i> Atur Ulang Kata Sandi</a>
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
	public function json_data_pengguna_role_3()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('user_sitac a', 'a.*,b.nama AS tl', '', '', '', '', '', array(
			'table' => 'user_tl b',
			'on' => 'a.tl=b.user_id',
			'pos' => 'LEFT'
		))->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['tl'] = $value->tl;
			$isi['nama'] = $value->nama;
			$isi['alamat'] = $value->alamat;
			$isi['no_hp'] = $value->no_hp;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
					<hr>
					<a class="dropdown-item" href="'.base_url().'admin_side/atur_ulang_kata_sandi_akun_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Atur Ulang Kata Sandi"><i class="ik ik-refresh-ccw"></i> Atur Ulang Kata Sandi</a>
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
	public function json_data_pengguna_role_4()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('user_investor a', 'a.*')->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['nik'] = $value->nik;
			$isi['alamat'] = $value->alamat;
			$isi['no_hp'] = $value->no_hp;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
					<hr>
					<a class="dropdown-item" href="'.base_url().'admin_side/atur_ulang_kata_sandi_akun_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Atur Ulang Kata Sandi"><i class="ik ik-refresh-ccw"></i> Atur Ulang Kata Sandi</a>
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
	public function json_data_pengguna_role_5()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('user_admin_bumdesa a', 'a.*')->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['alamat'] = $value->alamat;
			$isi['no_hp'] = $value->no_hp;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
					<hr>
					<a class="dropdown-item" href="'.base_url().'admin_side/atur_ulang_kata_sandi_akun_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Atur Ulang Kata Sandi"><i class="ik ik-refresh-ccw"></i> Atur Ulang Kata Sandi</a>
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
	public function json_data_pengguna_role_6()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('user_admin_spb a', 'a.*')->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['alamat'] = $value->alamat;
			$isi['no_hp'] = $value->no_hp;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
					<hr>
					<a class="dropdown-item" href="'.base_url().'admin_side/atur_ulang_kata_sandi_akun_pengguna/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Atur Ulang Kata Sandi"><i class="ik ik-refresh-ccw"></i> Atur Ulang Kata Sandi</a>
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
	public function tambah_data_pengguna()
	{
		$data['parent'] = 'master';
		$data['child'] = 'user';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Data Pengguna';
		$data['breadcrumbs3'] = 'Tambah Data';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/tambah_data_pengguna',$data);
		$this->load->view('admin/template/footer');
	}
	public function simpan_data_pengguna()
	{
		$cek_username = $this->Main_model->getSelectedData('user a', 'a.*',array('a.username'=>$this->input->post('username')))->row();
		if($cek_username==NULL){
			$this->db->trans_start();
			$get_user_id = $this->Main_model->getLastID('user','id');

			$data_insert1 = array(
				'id' => $get_user_id['id']+1,
				'username' => $this->input->post('username'),
				'pass' => $this->input->post('password'),
				'fullname' => $this->input->post('nama'),
				'is_active' => '1',
				'created_by' => $this->session->userdata('id'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->Main_model->insertData('user',$data_insert1);
			// print_r($data_insert1);

			$data_insert2 = array(
				'user_id' => $get_user_id['id']+1,
				'role_id' => $this->input->post('role')
			);
			$this->Main_model->insertData('user_to_role',$data_insert2);
			// print_r($data_insert2);

			if($this->input->post('role')=='2'){
				$data_insert3 = array(
					'user_id' => $get_user_id['id']+1,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp')
				);
				$this->Main_model->insertData('user_gm',$data_insert3);
				// print_r($data_insert3);
			}elseif($this->input->post('role')=='3'){
				$data_insert3 = array(
					'user_id' => $get_user_id['id']+1,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp'),
					'id_regional' => $this->input->post('id_regional')
				);
				$this->Main_model->insertData('user_tl',$data_insert3);
				// print_r($data_insert3);
			}elseif($this->input->post('role')=='4'){
				$data_insert3 = array(
					'user_id' => $get_user_id['id']+1,
					'tl' => $this->input->post('tl'),
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp')
				);
				$this->Main_model->insertData('user_sitac',$data_insert3);
				// print_r($data_insert3);
			}elseif($this->input->post('role')=='5'){
				$data_insert3 = array(
					'user_id' => $get_user_id['id']+1,
					'nama' => $this->input->post('nama'),
					'nik' => $this->input->post('nik'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp')
				);
				$this->Main_model->insertData('user_investor',$data_insert3);
				// print_r($data_insert3);
			}elseif($this->input->post('role')=='6'){
				$data_insert3 = array(
					'user_id' => $get_user_id['id']+1,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp')
				);
				$this->Main_model->insertData('user_admin_bumdesa',$data_insert3);
				// print_r($data_insert3);
			}elseif($this->input->post('role')=='7'){
				$data_insert3 = array(
					'user_id' => $get_user_id['id']+1,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp')
				);
				$this->Main_model->insertData('user_admin_spb',$data_insert3);
				// print_r($data_insert3);
			}else{
				echo'';
			}

			$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data pengguna (".$this->input->post('nama').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/tambah_data_pengguna/'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/data_pengguna'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Username telah digunakan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_pengguna/'</script>";
		}
	}
	public function detail_data_pengguna()
	{
		$data['parent'] = 'master';
		$data['child'] = 'user';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Data Pengguna';
		$data['breadcrumbs3'] = 'Detail Data';
		$data['data_utama'] = $this->Main_model->getSelectedData('user a', 'a.*', array('md5(a.id)'=>$this->uri->segment(3)))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/detail_data_pengguna',$data);
		$this->load->view('admin/template/footer');
	}
	public function ubah_data_pengguna()
	{
		$data['parent'] = 'master';
		$data['child'] = 'user';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Data Pengguna';
		$data['breadcrumbs3'] = 'Ubah Data';
		$data['data_utama'] = $this->Main_model->getSelectedData('user a', 'a.*', array('md5(a.id)'=>$this->uri->segment(3)))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/ubah_data_pengguna',$data);
		$this->load->view('admin/template/footer');
	}
	public function perbarui_data_pengguna()
	{
		$this->db->trans_start();
		$data_insert1 = array(
			'fullname' => $this->input->post('nama')
		);
		$this->Main_model->updateData('user',$data_insert1,array('md5(id)'=>$this->input->post('id')));

		$data_insert2 = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp')
		);
		$this->Main_model->updateData('pengguna',$data_insert2,array('md5(user_id)'=>$this->input->post('id')));

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Mengubah data pengguna (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_pengguna/".$this->input->post('id')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_pengguna/'</script>";
		}
	}
	public function atur_ulang_kata_sandi_akun_pengguna()
	{
		$this->db->trans_start();
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('user a', 'a.*',array('md5(a.id)'=>$this->uri->segment(3)))->row();
		$user_id = $get_data->id;
		$name = $get_data->fullname;

		$this->Main_model->updateData('user',array('pass'=>'1234'),array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Updating data","Mengatur ulang kata sandi akun pengguna (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_pengguna/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_pengguna/'</script>";
		}
	}
	public function hapus_data_pengguna()
	{
		$this->db->trans_start();
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('user_to_role a', 'a.user_id,a.role_id,b.fullname AS nama', array('md5(a.user_id)'=>$this->uri->segment(3)), '', '', '', '', array(
			'table' => 'user b',
			'on' => 'a.user_id=b.id',
			'pos' => 'LEFT'
		))->row();
		$user_id = $get_data->user_id;
		$name = $get_data->nama;

		if($get_data->role_id=='2'){
			$this->Main_model->deleteData('user_gm', array('user_id'=>$user_id));
		}elseif($get_data->role_id=='3'){
			$this->Main_model->deleteData('user_tl', array('user_id'=>$user_id));
		}elseif($get_data->role_id=='4'){
			$this->Main_model->deleteData('user_sitac', array('user_id'=>$user_id));
		}elseif($get_data->role_id=='5'){
			$this->Main_model->deleteData('user_investor', array('user_id'=>$user_id));
		}elseif($get_data->role_id=='6'){
			$this->Main_model->deleteData('user_admin_bumdesa', array('user_id'=>$user_id));
		}elseif($get_data->role_id=='7'){
			$this->Main_model->deleteData('user_admin_spb', array('user_id'=>$user_id));
		}else{
			echo'';
		}

		$this->Main_model->deleteData('investor_spb', array('user_id'=>$user_id));
		$this->Main_model->deleteData('user', array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Menghapus akun pengguna (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_pengguna/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_pengguna/'</script>";
		}
	}
	/* Data SPBU */
	public function data_spbu()
	{
		$data['parent'] = 'master';
		$data['child'] = 'tool';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'SPBU';
		$data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/data_spbu',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_data_spbu()
	{
		$get_data = $this->Main_model->getSelectedData('spbu a', 'a.*', array('a.is_active'=>'1'))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['kode_spbu'] = $value->kode_spbu;
			$isi['alamat'] = $value->alamat;
			if($value->is_active=='1'){
				$isi['status'] = 'Aktif';
			}else{
				$isi['status'] = 'Tidak Aktif';
			}
			$get_kecamatan = $this->Main_model->getSelectedData('kecamatan a', 'a.*', array('a.id_kecamatan'=>$value->id_kecamatan))->row();
			$get_kabupaten = $this->Main_model->getSelectedData('kabupaten a', 'a.*', array('a.id_kabupaten'=>$value->id_kabupaten))->row();
			$isi['wilayah'] = $get_kecamatan->nm_kecamatan.', '.$get_kabupaten->nm_kabupaten;
			$get_data_investor = $this->Main_model->getSelectedData('investor_spb a', 'a.*,b.fullname', array('a.id_spbu'=>$value->id_spbu), '', '', '', '', array(
				'table' => 'user b',
				'on' => 'a.user_id=b.id',
				'pos' => 'LEFT'
			))->result();
			$investor = '';
			foreach ($get_data_investor as $key => $row) {
				$investor .= '<li>'.$row->fullname.'</li>';			
			}
			$isi['investor'] = $investor;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_data_spbu/'.md5($value->id_spbu).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_spbu/'.md5($value->id_spbu).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/nonaktifkan_spbu/'.md5($value->id_spbu).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-slash"></i> Non-aktifkan SPBU</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_spbu/'.md5($value->id_spbu).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
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
	public function tambah_data_spbu()
	{
		$data['parent'] = 'master';
		$data['child'] = 'tool';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'SPBU';
		$data['breadcrumbs3'] = 'Tambah Data';
		$data['provinsi'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/tambah_data_spbu',$data);
		$this->load->view('admin/template/footer');
	}
	public function simpan_data_spbu()
	{
		$cek = $this->Main_model->getSelectedData('spbu a', 'a.*', array('a.kode_spbu'=>$this->input->post('kode_spbu')))->result();
		if($cek==NULL){
			$this->db->trans_start();
			$get_last_id = $this->Main_model->getLastID('spbu','id_spbu');
			$new_id = $get_last_id['id_spbu']+1;
			$data_insert1 = array(
				'id_spbu' => $new_id,
				'kode_spbu' => $this->input->post('kode_spbu'),
				'alamat' => $this->input->post('alamat'),
				'id_provinsi' => $this->input->post('id_provinsi'),
				'id_kabupaten' => $this->input->post('id_kabupaten'),
				'id_kecamatan' => $this->input->post('id_kecamatan'),
				'id_desa' => $this->input->post('id_desa'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal_daftar' => date('Y-m-d')
			);
			$this->Main_model->insertData('spbu',$data_insert1);
			// print_r($data_insert1);
	
			$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data SPBU (".$this->input->post('kode_spbu').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/tambah_data_spbu/'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/data_spbu'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_spbu/'</script>";
		}
	}
	public function detail_data_spbu()
	{
		$data['parent'] = 'master';
		$data['child'] = 'tool';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'SPBU';
		$data['breadcrumbs3'] = 'Detail Data';
		$data['data_utama'] = $this->Main_model->getSelectedData('spbu a', 'a.*,b.nm_provinsi,c.nm_kabupaten,d.nm_kecamatan,e.nm_desa,(SELECT COUNT(f.id_tangki) FROM tangki f WHERE f.id_spbu=a.id_spbu) AS jml_tangki,(SELECT SUM(f.kapasitas) FROM tangki f WHERE f.id_spbu=a.id_spbu) AS total_kapasitas', array('md5(a.id_spbu)'=>$this->uri->segment(3)), '', '', '', '', array(
			array(
				'table' => 'provinsi b',
				'on' => 'a.id_provinsi=b.id_provinsi',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'kabupaten c',
				'on' => 'a.id_kabupaten=c.id_kabupaten',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'kecamatan d',
				'on' => 'a.id_kecamatan=d.id_kecamatan',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'desa e',
				'on' => 'a.id_desa=e.id_desa',
				'pos' => 'LEFT'
			)
		))->row();
		$data['data_investor'] = $this->Main_model->getSelectedData('investor_spb a', 'a.*,b.nama,b.alamat,b.no_hp', array('md5(a.id_spbu)'=>$this->uri->segment(3)), 'a.persentase DESC', '', '', '', array(
			'table' => 'user_investor b',
			'on' => 'a.user_id=b.user_id',
			'pos' => 'LEFT'
		))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/detail_data_spbu',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_data_investor_spb()
	{
		$get_data = $this->Main_model->getSelectedData('investor_spb a', 'a.*,b.nama,b.alamat,b.no_hp', array('md5(a.id_spbu)'=>$this->input->post('id_tangki')), 'a.persentase DESC', '', '', '', array(
			'table' => 'user_investor b',
			'on' => 'a.user_id=b.user_id',
			'pos' => 'LEFT'
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['alamat'] = $value->alamat;
			$isi['no_hp'] = $value->no_hp;
			$isi['persentase'] = $value->persentase.'%';
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_investor_spbu/'.md5($value->id_spbu).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
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
	public function simpan_data_investor_spbu()
	{
		$this->db->trans_start();
		$id_spbu = '';
		$get_data = $this->Main_model->getSelectedData('spbu a', 'a.*',array('md5(a.id_spbu)'=>$this->input->post('id_spbu')))->row();
		$id_spbu = $get_data->id_spbu;

		$data_insert1 = array(
			'id_spbu' => $id_spbu,
			'user_id' => $this->input->post('investor'),
			'persentase' => $this->input->post('persentase')
		);
		$this->Main_model->insertData('investor_spb_cache',$data_insert1);
		// print_r($data_insert1);
		
		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Menambahkan investor SPBU (".$get_data->kode_spbu.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_investor_spbu/".$this->input->post('id_spbu')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_investor_spbu/".$this->input->post('id_spbu')."'</script>";
		}
	}
	public function ubah_data_investor_spbu()
	{
		$data['parent'] = 'master';
		$data['child'] = 'tool';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'SPBU';
		$data['breadcrumbs3'] = 'Investor';
		$data['data_utama'] = $this->Main_model->getSelectedData('investor_spb_cache a', 'a.id_spbu,a.persentase,b.*', array('md5(a.id_spbu)'=>$this->uri->segment(3)), '', '', '', '', array(
			'table' => 'user_investor b',
			'on' => 'a.user_id=b.user_id',
			'pos' => 'LEFT'
		))->result();
		$data['investor'] = $this->Main_model->getSelectedData('user_investor a', 'a.*,(SELECT b.user_id FROM investor_spb_cache b WHERE md5(b.id_spbu)="'.$this->uri->segment(3).'" AND b.user_id=a.user_id) AS inves')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/ubah_data_investor_spbu',$data);
		$this->load->view('admin/template/footer');
	}
	public function hapus_data_investor_spbu()
	{
		$this->db->trans_start();
		$id_spbu = '';
		$get_data = $this->Main_model->getSelectedData('spbu a', 'a.*',array('md5(a.id_spbu)'=>$this->uri->segment(4)))->row();
		$id_spbu = $get_data->id_spbu;

		$this->Main_model->deleteData('investor_spb_cache', array('id_spbu'=>$id_spbu,'md5(user_id)'=>$this->uri->segment(3)));
		
		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Menghapus data investor SPBU (".$get_data->kode_spbu.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_investor_spbu/".$this->uri->segment(4)."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_investor_spbu/".$this->uri->segment(4)."'</script>";
		}
	}
	public function perbarui_persentase_investor()
	{
		$this->db->trans_start();
		$id_spbu = '';
		$get_data = $this->Main_model->getSelectedData('investor_spb_cache a', 'a.*,b.kode_spbu', array('md5(a.id_spbu)'=>$this->input->post('id_spbu'),'md5(a.user_id)'=>$this->input->post('user_id')), '', '', '', '', array(
			'table' => 'spbu b',
			'on' => 'a.id_spbu=b.id_spbu',
			'pos' => 'LEFT'
		))->row();
		$id_spbu = $get_data->id_spbu;

		$data_insert1 = array(
			'persentase' => $this->input->post('persentase')
		);
		$this->Main_model->updateData('investor_spb_cache',$data_insert1,array('md5(id_spbu)'=>$this->input->post('id_spbu'),'md5(user_id)'=>$this->input->post('user_id')));
		// print_r($data_insert1);
		
		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Mengubah data investor SPBU (".$get_data->kode_spbu.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_investor_spbu/".$this->input->post('id_spbu')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_investor_spbu/".$this->input->post('id_spbu')."'</script>";
		}
	}
	public function perbarui_data_investor_spbu()
	{
		$persentase = 0;
		$get_data_investor = $this->Main_model->getSelectedData('investor_spb_cache a', 'a.*',array('md5(a.id_spbu)'=>$this->uri->segment(3)))->result();
		foreach ($get_data_investor as $key => $value) {
			$persentase += $value->persentase;
		}
		if($persentase==100){
			$this->db->trans_start();
			$id_spbu = '';
			$get_data = $this->Main_model->getSelectedData('spbu a', 'a.*',array('md5(a.id_spbu)'=>$this->uri->segment(3)))->row();
			$id_spbu = $get_data->id_spbu;
	
			$this->Main_model->deleteData('investor_spb', array('id_spbu'=>$id_spbu));
	
			foreach ($get_data_investor as $key => $value) {
				$data_insert1 = array(
					'id_spbu' => $id_spbu,
					'user_id' => $value->user_id,
					'persentase' => $value->persentase
				);
				$this->Main_model->insertData('investor_spb',$data_insert1);
				// print_r($data_insert1);
			}
			
			$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Mengubah data investor SPBU (".$get_data->kode_spbu.")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/ubah_data_investor_spbu/".$this->uri->segment(3)."'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
				echo "<script>window.location='".base_url()."admin_side/detail_data_spbu/".$this->uri->segment(3)."'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_investor_spbu/".$this->uri->segment(3)."'</script>";
		}
	}
	public function json_data_pembelian()
	{
		$get_data = $this->Main_model->getSelectedData('pembelian a', 'a.*', array('md5(a.id_spbu)'=>$this->input->post('id_spbu')))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['jenis'] = $value->jenis;
			$isi['kapasitas'] = $value->liter.' Liter';
			$isi['harga'] = 'Rp '.number_format($value->harga_satuan,2);
			$isi['total'] = 'Rp '.number_format($value->harga_total,2);
			$isi['tanggal'] = $this->Main_model->convert_tanggal($value->tanggal_pembelian);
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function json_data_penjualan()
	{
		$get_data = $this->Main_model->getSelectedData('penjualan_detail a', 'a.*,b.tanggal_penjualan', array('md5(b.id_spbu)'=>$this->input->post('id_spbu')), '', '', '', '', array(
			'table' => 'penjualan b',
			'on' => 'a.id_penjualan=b.id_penjualan',
			'pos' => 'LEFT'
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['jenis'] = $value->jenis;
			$isi['kapasitas'] = $value->liter.' Liter';
			$isi['total'] = 'Rp '.number_format($value->harga_total,2);
			$isi['tanggal'] = $this->Main_model->convert_tanggal($value->tanggal_penjualan);
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function json_data_servis()
	{
		$get_data = $this->Main_model->getSelectedData('servis_detail a', 'a.*,b.tanggal_pengajuan', array('md5(b.id_spbu)'=>$this->input->post('id_spbu')), '', '', '', '', array(
			'table' => 'servis b',
			'on' => 'a.id_servis=b.id_servis',
			'pos' => 'LEFT'
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['barang'] = $value->nama_barang;
			$isi['merk'] = $value->merk;
			$isi['jumlah'] = number_format($value->jumlah,0);
			if($value->harga==NULL OR $value->harga==0){
				$isi['harga'] = '-';
			}else{
				$isi['harga'] = 'Rp '.number_format($value->harga,2);
			}
			$isi['tanggal'] = $this->Main_model->convert_tanggal(substr($value->tanggal_pengajuan,0,10));
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function nonaktifkan_spbu()
	{
		$this->db->trans_start();
		$name = '';
		$get_data = $this->Main_model->getSelectedData('spbu a', 'a.*', array('md5(a.id_spbu)'=>$this->uri->segment(3)))->row();
		$name = $get_data->kode_spbu;

		$this->Main_model->updateData('spbu',array('is_active'=>'0'),array('id_spbu'=>$get_data->id_spbu));

		$this->Main_model->log_activity($this->session->userdata('id'),"Updating data","Menonaktifkan SPBU (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_spbu/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_spbu/'</script>";
		}
	}
	public function hapus_data_spbu()
	{
		$this->db->trans_start();
		$id_spbu = '';
		$get_data = $this->Main_model->getSelectedData('spbu a', 'a.*',array('md5(a.id_spbu)'=>$this->uri->segment(3)))->row();
		$get_data_penjualan = $this->Main_model->getSelectedData('penjualan a', 'a.*',array('md5(a.id_spbu)'=>$this->uri->segment(3)))->result();
		$id_spbu = $get_data->id_spbu;

		$this->Main_model->deleteData('investor_spb', array('id_spbu'=>$id_spbu));
		$this->Main_model->deleteData('tangki', array('id_spbu'=>$id_spbu));
		$this->Main_model->deleteData('tangki_detail', array('id_spbu'=>$id_spbu));
		$this->Main_model->deleteData('pembelian', array('id_spbu'=>$id_spbu));
		foreach ($get_data_penjualan as $key => $value) {
			$this->Main_model->deleteData('penjualan_detail', array('id_penjualan'=>$value->id_penjualan));
		}
		$this->Main_model->deleteData('penjualan', array('id_spbu'=>$id_spbu));
		
		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Menghapus data SPBU (".$get_data->kode_spbu.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_spbu/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_spbu/'</script>";
		}
	}
	/* Data Tangki */
	public function data_tangki()
	{
		$data['parent'] = 'master';
		$data['child'] = 'tool';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Tangki';
		$data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/data_tangki',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_data_tangki()
	{
		$get_data = $this->Main_model->getSelectedData('tangki a', 'a.*')->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['kapasitas'] = $value->kapasitas.' Liter';
			$isi['alamat'] = $value->alamat;
			if($value->is_active=='1'){
				$isi['status'] = 'Aktif';
			}else{
				$isi['status'] = 'Tidak Aktif';
			}
			$get_kecamatan = $this->Main_model->getSelectedData('kecamatan a', 'a.*', array('a.id_kecamatan'=>$value->id_kecamatan))->row();
			$get_kabupaten = $this->Main_model->getSelectedData('kabupaten a', 'a.*', array('a.id_kabupaten'=>$value->id_kabupaten))->row();
			$isi['wilayah'] = $get_kecamatan->nm_kecamatan.', '.$get_kabupaten->nm_kabupaten;
			$get_data_investor = $this->Main_model->getSelectedData('investor_spb a', 'a.*,b.fullname', array('a.id_tangki'=>$value->id_tangki), '', '', '', '', array(
				'table' => 'user b',
				'on' => 'a.user_id=b.id',
				'pos' => 'LEFT'
			))->result();
			$investor = '';
			foreach ($get_data_investor as $key => $row) {
				$investor .= '<li>'.$row->fullname.'</li>';			
			}
			$isi['investor'] = $investor;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_data_tangki/'.md5($value->id_tangki).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
					<a class="dropdown-item" href="'.base_url().'admin_side/ubah_data_tangki/'.md5($value->id_tangki).'" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="ik ik-edit-2"></i> Ubah Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.base_url().'admin_side/hapus_data_tangki/'.md5($value->id_tangki).'" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="ik ik-trash-2"></i> Hapus Data</a>
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
	public function tambah_data_tangki()
	{
		$data['parent'] = 'master';
		$data['child'] = 'tool';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Tangki';
		$data['breadcrumbs3'] = 'Tambah Data';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/tambah_data_tangki',$data);
		$this->load->view('admin/template/footer');
	}
	public function simpan_data_tangki()
	{
		$this->db->trans_start();
		$data_insert1 = array(
			'nomor_tangki' => $this->Main_model->get_nomor_tangki($this->input->post('nama')),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'nama_wali' => $this->input->post('nama_wali')
		);
		$this->Main_model->insertData('tangki',$data_insert1);
		// print_r($data_insert1);

		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data tangki (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_tangki/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_tangki'</script>";
		}
	}
	public function detail_data_tangki()
	{
		$data['parent'] = 'master';
		$data['child'] = 'tool';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Tangki';
		$data['breadcrumbs3'] = 'Detail Data';
		$data['data_utama'] = $this->Main_model->getSelectedData('tangki a', 'a.*,b.nm_provinsi,c.nm_kabupaten,d.nm_kecamatan,e.nm_desa', array('md5(a.id_tangki)'=>$this->uri->segment(3)), '', '', '', '', array(
			array(
				'table' => 'provinsi b',
				'on' => 'a.id_provinsi=b.id_provinsi',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'kabupaten c',
				'on' => 'a.id_kabupaten=c.id_kabupaten',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'kecamatan d',
				'on' => 'a.id_kecamatan=d.id_kecamatan',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'desa e',
				'on' => 'a.id_desa=e.id_desa',
				'pos' => 'LEFT'
			)
		))->row();
		$data['data_investor'] = $this->Main_model->getSelectedData('investor_spb a', 'a.*,b.nama,b.alamat,b.no_hp', array('md5(a.id_tangki)'=>$this->uri->segment(3)), 'a.persentase DESC', '', '', '', array(
			'table' => 'user_investor b',
			'on' => 'a.user_id=b.user_id',
			'pos' => 'LEFT'
		))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/detail_data_tangki',$data);
		$this->load->view('admin/template/footer');
	}
	public function ubah_data_tangki()
	{
		$data['parent'] = 'master';
		$data['child'] = 'tool';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Master';
		$data['breadcrumbs2'] = 'Tangki';
		$data['breadcrumbs3'] = 'Ubah Data';
		$data['data_utama'] = $this->Main_model->getSelectedData('tangki a', 'a.*', array('md5(a.id_tangki)'=>$this->uri->segment(3)))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/ubah_data_tangki',$data);
		$this->load->view('admin/template/footer');
	}
	public function perbarui_data_tangki()
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
		$this->Main_model->updateData('tangki',$data_insert1,array('md5(id_tangki)'=>$this->input->post('id')));

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Mengubah data tangki (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_tangki/".$this->input->post('id')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_tangki/'</script>";
		}
	}
	public function hapus_data_tangki()
	{
		$this->db->trans_start();
		$id_tangki = '';
		$get_data = $this->Main_model->getSelectedData('tangki a', 'a.*',array('md5(a.id_tangki)'=>$this->uri->segment(3)))->row();
		$id_tangki = $get_data->id_tangki;

		$this->Main_model->deleteData('investor_spb', array('id_tangki'=>$id_tangki));
		$this->Main_model->deleteData('tangki', array('id_tangki'=>$id_tangki));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Menghapus data tangki (".$id_tangki.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_tangki/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_tangki/'</script>";
		}
	}
	/* Other Function */
	public function ajax_page()
	{
		if($this->input->post('modul')=='form_tambah_data_pengguna'){
			$data['id'] = $this->input->post('id');
			$data['tl'] = $this->Main_model->getSelectedData('user_tl a', 'a.*')->result();
			$this->load->view('admin/master/ajax_page/ajax_form_tambah_data_pengguna',$data);
		}elseif($this->input->post('modul')=='modul_ubah_data_investor'){
			$pecahdata = explode('/',$this->input->post('id'));
			$data['investor'] = $this->Main_model->getSelectedData('investor_spb_cache a', 'a.*,b.nama,b.alamat,b.no_hp,b.nik', array('md5(a.id_spbu)'=>$pecahdata[1],'md5(a.user_id)'=>$pecahdata[0]), '', '', '', '', array(
				'table' => 'user_investor b',
				'on' => 'a.user_id=b.user_id',
				'pos' => 'LEFT'
			))->row();
			$this->load->view('admin/master/ajax_page/ajax_form_ubah_data_investor',$data);
		}
	}
	public function ajax_function()
	{
		if($this->input->post('modul')=='get_kabupaten_by_id_provinsi'){
			$data = $this->Main_model->getSelectedData('kabupaten a', 'a.*', array('a.id_provinsi'=>$this->input->post('id')))->result();
			echo'<option value="">-- Pilih --</option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_kabupaten.'">'.$value->nm_kabupaten.'</option>';
			}
		}elseif($this->input->post('modul')=='get_kecamatan_by_id_kabupaten'){
			$data = $this->Main_model->getSelectedData('kecamatan a', 'a.*', array('a.id_kabupaten'=>$this->input->post('id')))->result();
			echo'<option value="">-- Pilih --</option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_kecamatan.'">'.$value->nm_kecamatan.'</option>';
			}
		}elseif($this->input->post('modul')=='get_desa_by_id_kecamatan'){
			$data = $this->Main_model->getSelectedData('desa a', 'a.*', array('a.id_kecamatan'=>$this->input->post('id')))->result();
			echo'<option value="">-- Pilih --</option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_desa.'">'.$value->nm_desa.'</option>';
			}
		}
	}
}