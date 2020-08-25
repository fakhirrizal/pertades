<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountancy extends CI_Controller {
    function __construct() {
        parent::__construct();
	}
    public function index()
	{
		$data['parent'] = 'accountancy';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Pembukuan';
		$data['breadcrumbs2'] = '';
        $data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/accountancy/rekap_data',$data);
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
			$isi['saldo'] = 'Rp '.number_format($value->saldo,2);
			$isi['operasional'] = 'Rp '.number_format($value->anggaran_operasional,2);
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_keuangan/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
			$isi['saldo'] = 'Rp '.number_format($value->saldo,2);
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_keuangan/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
			$isi['saldo'] = 'Rp '.number_format($value->saldo,2);
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_keuangan/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
			$isi['saldo'] = 'Rp '.number_format($value->saldo,2);
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_keuangan/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
			$isi['saldo'] = 'Rp '.number_format($value->saldo,2);
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_keuangan/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
			$isi['saldo'] = 'Rp '.number_format($value->saldo,2);
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_keuangan/'.md5($value->user_id).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
	public function detail_keuangan()
	{
		$data['parent'] = 'accountancy';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Pembukuan';
		$data['breadcrumbs2'] = 'Detail Keuangan';
		$data['breadcrumbs3'] = '';
		$data['data_utama'] = $this->Main_model->getSelectedData('user a', 'a.*', array('md5(a.id)'=>$this->uri->segment(3)))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/accountancy/detail_keuangan',$data);
		$this->load->view('admin/template/footer');
	}
}