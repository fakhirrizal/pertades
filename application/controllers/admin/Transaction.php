<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    function __construct() {
        parent::__construct();
	}
	/* Data Pembelian */
    public function data_pembelian()
	{
		$data['parent'] = 'transaction';
		$data['child'] = 'purchasing';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Transaksi';
		$data['breadcrumbs2'] = 'Data Pembelian';
        $data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/transaction/data_pembelian',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_data_pembelian()
	{
		$get_data = $this->Main_model->getSelectedData('pembelian a', 'a.*,b.kode_spbu', array('b.is_active'=>'1'), '', '', '', '', array(
			'table' => 'spbu b',
			'on' => 'a.id_spbu=b.id_spbu',
			'pos' => 'LEFT'
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['kode_spbu'] = $value->kode_spbu;
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
	/* Data Penjualan */
    public function data_penjualan()
	{
		$data['parent'] = 'transaction';
		$data['child'] = 'selling';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Transaksi';
		$data['breadcrumbs2'] = 'Data Penjualan';
        $data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/transaction/data_penjualan',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_data_penjualan()
	{
		$get_data = $this->Main_model->getSelectedData('penjualan_detail a', 'a.*,b.tanggal_penjualan,c.kode_spbu', array('c.is_active'=>'1'), '', '', '', '', array(
			array(
				'table' => 'penjualan b',
				'on' => 'a.id_penjualan=b.id_penjualan',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'spbu c',
				'on' => 'b.id_spbu=c.id_spbu',
				'pos' => 'LEFT'
			)
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['jenis'] = $value->jenis;
			$isi['spbu'] = $value->kode_spbu;
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
}