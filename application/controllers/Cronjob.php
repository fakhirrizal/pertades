<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller {

	public function hitung_keuntungan()
	{
		$get_data = $this->Main_model->getSelectedData('cronjob a', '*', array('a.id'=>'0'))->row();
		$isi = json_decode($get_data->json);
		// echo $isi->last_id_penjualan;
		if($isi->last_id_penjualan=='' OR $isi->last_id_penjualan==NULL){
			echo'belum ada hitungan';
		}else{
			echo'sudah ada hitungan';
		}
		$data_tampung = array(
			'last_id_penjualan' => NULL,
			'last_update' => NULL
		);
		$masukin = json_encode($data_tampung);
		$data_insert1 = array(
			'keterangan' => 'Rekap keuntungan harian',
			'json' => $masukin
		);
		// $this->Main_model->updateData('cronjob',$data_insert1,array('id'=>'0'));


		// $get_data_spbu = $this->Main_model->getSelectedData('spbu a', '*', array('a.is_active'=>'1'))->result();
		// foreach ($get_data_spbu as $key => $value) {
		// 	$get_data_penjualan = $this->Main_model->getSelectedData('spbu a', '*', array('a.is_active'=>'1'))->result();
		// }
	}
}