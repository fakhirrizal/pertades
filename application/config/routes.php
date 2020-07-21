<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'Auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/* Auth */
$route['login'] = 'Auth/login';
$route['login_process'] = 'Auth/login_process';
$route['registrasi'] = 'Auth/registration';
$route['register_process'] = 'Auth/register_process';

/* Admin */
$route['admin_side/beranda'] = 'admin/App/home';
$route['admin_side/log_aktifitas'] = 'admin/App/log_activity';
$route['admin_side/hapus_data_log/(:any)'] = 'admin/App/delete_log_activity/$1';
$route['admin_side/cleaning_log'] = 'admin/App/cleaning_log';
$route['admin_side/tentang_aplikasi'] = 'admin/App/about';
$route['admin_side/bantuan'] = 'admin/App/helper';
$route['admin_side/profil'] = 'admin/App/profile';
$route['admin_side/perbarui_profil'] = 'admin/App/profile_update';

$route['admin_side/data_pengguna'] = 'admin/Master/data_pengguna';
$route['admin_side/tambah_data_pengguna'] = 'admin/Master/tambah_data_pengguna';
$route['admin_side/simpan_data_pengguna'] = 'admin/Master/simpan_data_pengguna';
$route['admin_side/detail_data_pengguna/(:any)'] = 'admin/Master/detail_data_pengguna/$1';
$route['admin_side/ubah_data_pengguna/(:any)'] = 'admin/Master/ubah_data_pengguna/$1';
$route['admin_side/perbarui_data_pengguna'] = 'admin/Master/perbarui_data_pengguna';
$route['admin_side/atur_ulang_kata_sandi_akun_pengguna/(:any)'] = 'admin/Master/atur_ulang_kata_sandi_akun_pengguna/$1';
$route['admin_side/hapus_data_pengguna/(:any)'] = 'admin/Master/hapus_data_pengguna/$1';
$route['admin_side/data_tangki'] = 'admin/Master/data_tangki';
$route['admin_side/tambah_data_tangki'] = 'admin/Master/tambah_data_tangki';
$route['admin_side/simpan_data_tangki'] = 'admin/Master/simpan_data_tangki';
$route['admin_side/detail_data_tangki/(:any)'] = 'admin/Master/detail_data_tangki/$1';
$route['admin_side/ubah_data_tangki/(:any)'] = 'admin/Master/ubah_data_tangki/$1';
$route['admin_side/perbarui_data_tangki'] = 'admin/Master/perbarui_data_tangki';
$route['admin_side/hapus_data_tangki/(:any)'] = 'admin/Master/hapus_data_tangki/$1';

$route['admin_side/persentase'] = 'admin/Master/persentase';
$route['admin_side/simpan_persentase'] = 'admin/Master/simpan_persentase';

$route['admin_side/data_spbu'] = 'admin/Master/data_spbu';
$route['admin_side/tambah_data_spbu'] = 'admin/Master/tambah_data_spbu';
$route['admin_side/simpan_data_spbu'] = 'admin/Master/simpan_data_spbu';
$route['admin_side/detail_data_spbu/(:any)'] = 'admin/Master/detail_data_spbu/$1';
$route['admin_side/simpan_data_investor_spbu'] = 'admin/Master/simpan_data_investor_spbu';
$route['admin_side/ubah_data_investor_spbu/(:any)'] = 'admin/Master/ubah_data_investor_spbu/$1';
$route['admin_side/hapus_data_investor_spbu/(:any)/(:any)'] = 'admin/Master/hapus_data_investor_spbu/$1/$2';
$route['admin_side/perbarui_data_investor_spbu/(:any)'] = 'admin/Master/perbarui_data_investor_spbu/$1';
$route['admin_side/perbarui_persentase_investor'] = 'admin/Master/perbarui_persentase_investor';
$route['admin_side/ubah_data_spbu/(:any)'] = 'admin/Master/ubah_data_spbu/$1';
$route['admin_side/perbarui_data_spbu'] = 'admin/Master/perbarui_data_spbu';
$route['admin_side/nonaktifkan_spbu/(:any)'] = 'admin/Master/nonaktifkan_spbu/$1';
$route['admin_side/hapus_data_spbu/(:any)'] = 'admin/Master/hapus_data_spbu/$1';

$route['admin_side/data_pembelian'] = 'admin/Transaction/data_pembelian';
$route['admin_side/data_penjualan'] = 'admin/Transaction/data_penjualan';

$route['admin_side/rekap_data'] = 'admin/Report/rekap_data';

$route['admin_side/pembukuan'] = 'admin/Accountancy';
$route['admin_side/detail_keuangan/(:any)'] = 'admin/Accountancy/detail_keuangan/$1';

$route['admin_side/regional'] = 'admin/Master/regional';
$route['admin_side/tambah_data_regional'] = 'admin/Master/tambah_data_regional';
$route['admin_side/simpan_data_regional'] = 'admin/Master/simpan_data_regional';
$route['admin_side/ubah_data_regional/(:any)'] = 'admin/Master/ubah_data_regional/$1';
$route['admin_side/perbarui_data_regional'] = 'admin/Master/perbarui_data_regional';
$route['admin_side/hapus_data_regional/(:any)'] = 'admin/Master/hapus_data_regional/$1';

/* REST API */
$route['api'] = 'Rest_server/documentation';