<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    function __construct() {
        parent::__construct();
	}
    public function rekap_data()
	{
		$data['parent'] = 'transaction';
		$data['child'] = 'report';
		$data['grand_child'] = '';
		$data['breadcrumbs1'] = 'Transaksi';
		$data['breadcrumbs2'] = 'Rekap Data';
        $data['breadcrumbs3'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/report/rekap_data',$data);
		$this->load->view('admin/template/footer');
	}
}