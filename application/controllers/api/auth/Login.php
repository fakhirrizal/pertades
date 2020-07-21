<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller {

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
		$cek = $this->Main_model->getSelectedData('user a', '*', array("a.username" => $this->post('username'), "a.is_active" => '1', 'a.deleted' => '0'), 'a.username ASC', '1')->result();
		if($cek!=NULL){
			$cek2 = $this->Main_model->getSelectedData('user a', 'a.fullname,a.photo,a.id AS user_id,c.definition,b.role_id,a.total_login,a.login_attempts', array("a.username" => $this->post('username'),'pass' => $this->post('password'), "a.is_active" => '1', 'a.deleted' => '0'), 'a.username ASC', '1', '', '', array(
				array(
                    'table' => 'user_to_role b',
                    'on' => 'a.id=b.user_id',
                    'pos' => 'LEFT'
                ),
                array(
                    'table' => 'user_role c',
                    'on' => 'b.role_id=c.id',
                    'pos' => 'LEFT'
                )
			))->result();
			if($cek2!=NULL){
				if($this->post('token')==''){
					foreach ($cek as $key => $value) {
						$login_attempts = ($value->login_attempts)+1;
						$data_log = array(
							'login_attempts' => $login_attempts,
							'last_login_attempt' => date('Y-m-d H-i-s')
						);
						$this->Main_model->updateData('user',$data_log,array('id'=>$value->id));
						$hasil['status'] = '0';
						$hasil['message'] = 'Harap memasukkan Device ID';
						$this->response($hasil, 200);
					}
				}else{
					foreach ($cek2 as $key => $value) {
						$total_login = ($value->total_login)+1;
						$login_attempts = ($value->login_attempts)+1;
						$data_log = array(
							'total_login' => $total_login,
							'last_login' => date('Y-m-d H-i-s'),
							'last_activity' => date('Y-m-d H-i-s'),
							'login_attempts' => $login_attempts,
							'last_login_attempt' => date('Y-m-d H-i-s'),
							'ip_address' => $this->input->ip_address(),
							'verification_token' => $this->post('token')
						);
						$this->Main_model->updateData('user',$data_log,array('id'=>$value->user_id));
                        $this->Main_model->log_activity($value->user_id,'Login to system','Login via mobile apps');
                        if($value->role_id=='1'){
                            $hasil['status'] = '1';
                            $hasil['message'] = 'Anda telah berhasil login';
                            $hasil['user_id'] = $value->user_id;
                            $hasil['level'] = $value->definition;
                            $hasil['nama'] = $value->fullname;
                            $hasil['tanggal_lahir'] = '';
                            $hasil['email'] = '';
                            $hasil['no_hp'] = '';
                            $this->response($hasil, 200);
                        }elseif($value->role_id=='2'){
                            $get_data_user = $this->Main_model->getSelectedData('user_gm a', '*', array("a.user_id" => $value->user_id), '', '1')->row();
                            $hasil['status'] = '1';
                            $hasil['message'] = 'Anda telah berhasil login';
                            $hasil['user_id'] = $value->user_id;
                            $hasil['level'] = $value->definition;
                            $hasil['nama'] = $value->fullname;
                            $hasil['tanggal_lahir'] = '';
                            $hasil['email'] = '';
                            $hasil['no_hp'] = $get_data_user->no_hp;
                            $this->response($hasil, 200);
                        }elseif($value->role_id=='3'){
                            $get_data_user = $this->Main_model->getSelectedData('user_tl a', '*', array("a.user_id" => $value->user_id), '', '1')->row();
                            $hasil['status'] = '1';
                            $hasil['message'] = 'Anda telah berhasil login';
                            $hasil['user_id'] = $value->user_id;
                            $hasil['level'] = $value->definition;
                            $hasil['nama'] = $value->fullname;
                            $hasil['tanggal_lahir'] = '';
                            $hasil['email'] = '';
                            $hasil['no_hp'] = $get_data_user->no_hp;
                            $this->response($hasil, 200);
                        }elseif($value->role_id=='4'){
                            $get_data_user = $this->Main_model->getSelectedData('user_sitac a', '*', array("a.user_id" => $value->user_id), '', '1')->row();
                            $hasil['status'] = '1';
                            $hasil['message'] = 'Anda telah berhasil login';
                            $hasil['user_id'] = $value->user_id;
                            $hasil['level'] = $value->definition;
                            $hasil['nama'] = $value->fullname;
                            $hasil['tanggal_lahir'] = '';
                            $hasil['email'] = '';
                            $hasil['no_hp'] = $get_data_user->no_hp;
                            $this->response($hasil, 200);
                        }elseif($value->role_id=='5'){
                            $get_data_user = $this->Main_model->getSelectedData('user_investor a', '*', array("a.user_id" => $value->user_id), '', '1')->row();
                            $hasil['status'] = '1';
                            $hasil['message'] = 'Anda telah berhasil login';
                            $hasil['user_id'] = $value->user_id;
                            $hasil['level'] = $value->definition;
                            $hasil['nama'] = $value->fullname;
                            $hasil['tanggal_lahir'] = '';
                            $hasil['email'] = '';
                            $hasil['no_hp'] = $get_data_user->no_hp;
                            $this->response($hasil, 200);
                        }elseif($value->role_id=='6'){
                            $get_data_user = $this->Main_model->getSelectedData('user_admin_bumdesa a', '*', array("a.user_id" => $value->user_id), '', '1')->row();
                            $hasil['status'] = '1';
                            $hasil['message'] = 'Anda telah berhasil login';
                            $hasil['user_id'] = $value->user_id;
                            $hasil['level'] = $value->definition;
                            $hasil['nama'] = $value->fullname;
                            $hasil['tanggal_lahir'] = '';
                            $hasil['email'] = '';
                            $hasil['no_hp'] = $get_data_user->no_hp;
                            $this->response($hasil, 200);
                        }elseif($value->role_id=='7'){
                            $get_data_user = $this->Main_model->getSelectedData('user_admin_spb a', '*', array("a.user_id" => $value->user_id), '', '1')->row();
                            $hasil['status'] = '1';
                            $hasil['message'] = 'Anda telah berhasil login';
                            $hasil['user_id'] = $value->user_id;
                            $hasil['level'] = $value->definition;
                            $hasil['nama'] = $value->fullname;
                            $hasil['tanggal_lahir'] = '';
                            $hasil['email'] = '';
                            $hasil['no_hp'] = $get_data_user->no_hp;
                            $this->response($hasil, 200);
                        }
					}
				}
			}else{
				foreach ($cek as $key => $value) {
					$login_attempts = ($value->login_attempts)+1;
					$data_log = array(
						'login_attempts' => $login_attempts,
						'last_login_attempt' => date('Y-m-d H-i-s')
					);
					$this->Main_model->updateData('user',$data_log,array('id'=>$value->id));
					$hasil['status'] = '0';
					$hasil['message'] = 'Password yg Anda masukkan tidak valid';
					$this->response($hasil, 200);
				}
			}
		}
		else{
			$hasil['status'] = '0';
			$hasil['message'] = 'Username yang Anda masukkan tidak terdaftar';
			$this->response($hasil, 200);
		}
	}

	function index_put() {
	}

	function index_delete() {
    }
}