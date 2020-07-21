<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Logout extends REST_Controller {

	function __construct()
	{
		parent::__construct();

		$this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
		$this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
	}
	function index_get() {
	}

	function index_post() {
		
        if($this->post('token')==''){
            $hasil['status'] = '0';
            $hasil['message'] = 'Harap memasukkan Device ID';
            $this->response($hasil, 200);
        }else{
            $cek = $this->Main_model->getSelectedData('user a', '*', array("a.verification_token" => $this->post('token')), 'a.username ASC', '1')->result();
            if($cek==NULL){
                $hasil['status'] = '0';
                $hasil['message'] = 'Username tidak terdaftar';
                $this->response($hasil, 200);
            }else{
                foreach ($cek as $key => $value) {
                    $data_log = array(
                        'verification_token' => ''
                    );
                    $this->Main_model->updateData('user',$data_log,array('id'=>$value->id));
                    $this->Main_model->log_activity($value->id,'Logout from system','Logout via mobile apps');
                    $hasil['status'] = '1';
                    $hasil['message'] = 'Anda telah berhasil logout';
                    $this->response($hasil, 200);
                }
            }
        }
	}

	function index_put() {
	}

	function index_delete() {
    }
}