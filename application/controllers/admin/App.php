<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();
	}
    public function home()
	{
		$cur_date = date('Y-m-d');
		$data['parent'] = 'home';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Beranda';
		$data['breadcrumbs2'] = '';
		$data['breadcrumbs3'] = '';
		// $data['data_fisioterapi'] = $this->Main_model->getSelectedData('fisioterapi a', 'a.*', array('a.deleted'=>'0'))->result();
		// $data['data_fisioterapi_limit'] = $this->Main_model->getSelectedData('fisioterapi a', 'a.*,b.photo', array('a.deleted'=>'0'), '', '5', '', '', array(
		// 	'table' => 'user b',
		// 	'on' => 'a.user_id=b.id',
		// 	'pos' => 'LEFT'
		// ))->result();
		// $data['data_pasien'] = $this->Main_model->getSelectedData('pasien a', 'a.*', array('a.deleted'=>'0'))->result();
		// $data['data_pasien_limit'] = $this->Main_model->getSelectedData('pasien a', 'a.*', array('a.deleted'=>'0'), '', '5')->result();
		// $data['data_pemeriksaan'] = $this->db->query("SELECT a.*,b.nama AS fisioterapi,c.nama AS pasien FROM pemeriksaan a LEFT JOIN fisioterapi b ON a.user_id=b.user_id LEFT JOIN pasien c ON a.id_pasien=c.id_pasien WHERE a.created_at LIKE '%".$cur_date."%' ORDER BY `a`.`created_at` ASC")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/home',$data);
		$this->load->view('admin/template/footer');
	}
	public function log_activity()
	{
		$data['parent'] = 'log_activity';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Log Aktifitas';
		$data['breadcrumbs2'] = '';
		$data['breadcrumbs3'] = '';
		$data['data_tabel'] = $this->Main_model->getSelectedData('activity_logs a', 'a.*,b.fullname', '', "a.activity_time DESC",'','','',array(
			'table' => 'user b',
			'on' => 'a.user_id=b.id',
			'pos' => 'LEFT'
		))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/log_activity',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_log_activity()
	{
		$get_data = $this->Main_model->getSelectedData('activity_logs a', 'a.*,b.fullname', '', "a.activity_time DESC",'','','',array(
			'table' => 'user b',
			'on' => 'a.user_id=b.id',
			'pos' => 'LEFT'
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$pecah_datetime = explode(' ',$value->activity_time);
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->fullname;
			$isi['tipe'] = $value->activity_type;
			$isi['aktifitas'] = $value->activity_data;
			$isi['waktu'] = $this->Main_model->convert_tanggal($pecah_datetime[0]).' '.$pecah_datetime[1];
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['aksi'] =	'
			<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Aksi
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item detaildata" id="'.md5($value->activity_id).'"><i class="ik ik-corner-up-right"></i> Detail Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_log/'.md5($value->activity_id)).'"><i class="ik ik-trash"></i> Hapus Data</a>
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
	public function delete_log_activity()
	{
		$this->db->trans_start();
		$activity_id = '';
		$get_data = $this->Main_model->getSelectedData('activity_logs a', 'a.*',array('md5(a.activity_id)'=>$this->uri->segment(3)))->row();
		$activity_id = $get_data->activity_id;

		$this->Main_model->deleteData('activity_logs', array('activity_id'=>$activity_id));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_aktifitas/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_aktifitas/'</script>";
		}
	}
	public function cleaning_log()
	{
		$this->db->trans_start();
		$this->Main_model->cleanData('activity_logs');
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_aktifitas/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_aktifitas/'</script>";
		}
	}
	public function about()
	{
		$data['parent'] = 'about';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Tentang Aplikasi';
		$data['breadcrumbs2'] = '';
		$data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/about',$data);
		$this->load->view('admin/template/footer');
	}
	public function helper()
	{
		$data['parent'] = 'helper';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = '';
		$data['breadcrumbs2'] = '';
		$data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/helper',$data);
		$this->load->view('admin/template/footer');
	}
	public function profile(){
		$data['parent'] = '';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Data Profil';
		$data['breadcrumbs2'] = '';
		$data['breadcrumbs3'] = '';
		$data['data_utama'] = $this->Main_model->getSelectedData('user a', 'a.*', array('a.id'=>$this->session->userdata('id')))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/profile',$data);
		$this->load->view('admin/template/footer');
	}
	public function profile_update()
	{
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/photo_profile/'; // path folder
		$config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '3072'; // maksimum besar file 3M
		$config['max_width']  = '5000'; // lebar maksimum 5000 px
		$config['max_height']  = '5000'; // tinggi maksimum 5000 px
		$config['file_name'] = $nmfile; // nama yang terupload nantinya

		$this->upload->initialize($config);

		if(isset($_FILES['foto']['name']))
		{
			if(!$this->upload->do_upload('foto'))
			{
				echo'';
			}
			else
			{
				$gbr = $this->upload->data();
				$this->Main_model->updateData("user",array('photo'=>$gbr['file_name']),array('id'=>$this->session->userdata('id')));
			}
		}else{echo'';}

		$this->db->trans_start();
		$data_update0 = array(
			'fullname' => $this->input->post('nama')
		);
		$this->Main_model->updateData('user',$data_update0,array('id'=>$this->session->userdata('id')));
		if($this->input->post('password')=='' OR $this->input->post('password')==NULL){
			echo'';
		}else{
			$data_update1 = array(
				'pass' => $this->input->post('password')
			);
			$this->Main_model->updateData('user',$data_update1,array('id'=>$this->session->userdata('id')));
		}
		$this->db->trans_complete();
		$this->Main_model->log_activity($this->session->userdata('id'),"Updating data","Mengubah data profil",$this->session->userdata('location'));
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!!!</strong> Data gagal diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/profil/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Yeah!!!</strong> Data sukses diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button></div>' );
			echo "<script>window.location='".base_url()."admin_side/profil/'</script>";
		}
	}
	/* Menu setting and user's permission */
	public function ajax_function()
	{
		if($this->input->post('modul')=='modul_detail_log_aktifitas'){
			$data['data_utama'] = $this->Main_model->getSelectedData('activity_logs a', 'a.*,b.fullname', array('md5(a.activity_id)'=>$this->input->post('id')), "",'','','',array(
				'table' => 'user b',
				'on' => 'a.user_id=b.id',
				'pos' => 'LEFT'
			))->result();
			$this->load->view('admin/app/ajax_function/ajax_detail_log_aktifitas',$data);
		}
	}
}