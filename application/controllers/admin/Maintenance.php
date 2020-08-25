<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {
    function __construct() {
        parent::__construct();
	}
    public function rekap_data()
	{
		$data['parent'] = 'maintenance';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Maintenance';
		$data['breadcrumbs2'] = 'Rekap Data';
        $data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/maintenance/rekap_data',$data);
		$this->load->view('admin/template/footer');
    }
    public function json_pending()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('servis a', 'a.*,b.fullname,c.kode_spbu', array('a.status'=>'0'), 'a.tanggal_pengajuan ASC', '', '', '', array(
			array(
                'table' => 'user b',
                'on' => 'a.yang_mengajukan=b.id',
                'pos' => 'LEFT'
            ),
            array(
                'table' => 'spbu c',
                'on' => 'a.id_spbu=c.id_spbu',
                'pos' => 'LEFT'
            )
		))->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->fullname;
			$isi['kode_spbu'] = $value->kode_spbu;
			$isi['tanggal'] = $this->Main_model->convert_tanggal(substr($value->tanggal_pengajuan,0,10));
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_servis/'.md5($value->id_servis).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
    public function json_disetujui()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('servis a', 'a.*,b.fullname,c.kode_spbu', array('a.status'=>'0'), 'a.tanggal_pengajuan ASC', '', '', '', array(
			array(
                'table' => 'user b',
                'on' => 'a.yang_mengajukan=b.id',
                'pos' => 'LEFT'
            ),
            array(
                'table' => 'spbu c',
                'on' => 'a.id_spbu=c.id_spbu',
                'pos' => 'LEFT'
            )
		))->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->fullname;
			$isi['kode_spbu'] = $value->kode_spbu;
			$isi['tanggal1'] = $this->Main_model->convert_tanggal(substr($value->tanggal_pengajuan,0,10));
			$isi['tanggal2'] = $this->Main_model->convert_tanggal(substr($value->tanggal_persetujuan,0,10));
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_servis/'.md5($value->id_servis).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
    public function json_ditolak()
	{
		$data_tampil = array();
		$no = 1;
		$get_data = $this->Main_model->getSelectedData('servis a', 'a.*,b.fullname,c.kode_spbu', array('a.status'=>'0'), 'a.tanggal_pengajuan ASC', '', '', '', array(
			array(
                'table' => 'user b',
                'on' => 'a.yang_mengajukan=b.id',
                'pos' => 'LEFT'
            ),
            array(
                'table' => 'spbu c',
                'on' => 'a.id_spbu=c.id_spbu',
                'pos' => 'LEFT'
            )
		))->result();
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['nama'] = $value->fullname;
			$isi['kode_spbu'] = $value->kode_spbu;
			$isi['tanggal1'] = $this->Main_model->convert_tanggal(substr($value->tanggal_pengajuan,0,10));
			$isi['tanggal2'] = $this->Main_model->convert_tanggal(substr($value->tanggal_persetujuan,0,10));
			$isi['aksi'] =	'
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <i class="ik ik-chevron-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
					<a class="dropdown-item" href="'.base_url().'admin_side/detail_servis/'.md5($value->id_servis).'" data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="ik ik-eye"></i> Detail Data</a>
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
    public function detail_servis()
	{
		$data['parent'] = 'maintenance';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Servis';
		$data['breadcrumbs2'] = 'Detail Data';
        $data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/maintenance/detail_servis',$data);
		$this->load->view('admin/template/footer');
    }
}