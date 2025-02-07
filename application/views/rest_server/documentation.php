<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dokumentasi API</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= base_url(); ?>assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= base_url(); ?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?= base_url(); ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?= base_url(); ?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link href="<?=base_url('assets/icon.JPG');?>" rel="icon" type="image/x-icon">
    </head>
    <body class="page-container-bg-solid page-md">
        <div class="page-container">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="container">
                        <div class="page-content-inner">
							<div class="portlet light ">
								<div class="portlet-title tabbable-line">
									<div class="caption">
										<i class="icon-share font-dark"></i>
										<span class="caption-subject font-dark bold ">Dokumentasi API</span>
									</div>
									<ul class="nav nav-tabs">
										<li>
											<a href="#portlet_tab2_3" data-toggle="tab"> Laporan </a>
										</li>
										<li>
											<a href="#portlet_tab2_2" data-toggle="tab"> Data Master </a>
										</li>
										<li class="active">
											<a href="#portlet_tab2_1" data-toggle="tab"> Authentication </a>
										</li>
									</ul>
								</div>
								<div class="portlet-body">
									<div class="tab-content">
										<div class="tab-pane active" id="portlet_tab2_1">
											<!-- Awal -->
											<div class="portlet-body">
												<div class="panel-group accordion" id="accordion3">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
																<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1" aria-expanded="false"> <span class="label label-primary"> POST </span>&nbsp;&nbsp;{URL}/api/auth/Login</a>
															</h4>
														</div>
														<div id="collapse_3_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
															<div class="row">
																<div class="col-md-12">
																	<div class="portlet light ">
																		<div class="portlet-title">
																			<b>URL</b> : https://seafoodau.eaoron.co.id/api/auth/Login<br>
																			<b>Method</b> : POST<br>
																			<b>Deskripsi</b> : Untuk mengetahui status user apakah terdaftar di sistem atau tidak.<br><br>
																		</div>
																		<div class="portlet-body">
																			Berikut parameter yang harus diisi,<br><br>
																			<textarea class='form-control' rows='5' readonly>
																				{
																						"username": NIK,
																						"password": string,
																						"device_id": string
																				}
																			</textarea><br>
																			Balikannya sebagai berikut (jika berhasil/ atau dikenali oleh sistem),<br><br>
																			<textarea class='form-control' rows='15' readonly>
																				{
																						"user_id": int,
																						"nik": string,
																						"nama": string,
																						"alamat": string,
																						"rt": string,
																						"rw": string,
																						"id_desa": string,
																						"id_kecamatan": string,
																						"id_kabupaten": string,
																						"id_provinsi": string,
																						"email": string,
																						"no_hp": string,
																						"foto": {url}
																				}
																			</textarea>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Akhir -->
											<!-- Awal -->
											<div class="portlet-body">
												<div class="panel-group accordion" id="accordion3">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
																<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2" aria-expanded="false"> <span class="label label-primary"> POST </span>&nbsp;&nbsp;{URL}/api/auth/Register</a>
															</h4>
														</div>
														<div id="collapse_3_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
															<div class="row">
																<div class="col-md-12">
																	<div class="portlet light ">
																		<div class="portlet-title">
																			<b>URL</b> : https://seafoodau.eaoron.co.id/api/auth/Register<br>
																			<b>Method</b> : POST<br>
																			<b>Deskripsi</b> : Untuk mendaftarkan data diri terhadap sistem, agar ketika masuk sistem dapat mengenali.<br><br>
																		</div>
																		<div class="portlet-body">
																			Berikut parameter yang harus diisi,<br><br>
																			<textarea class='form-control' rows='14' readonly>
																				{
																						"nik": string,
																						"password": string,
																						"nama": string,
																						"alamat": string,
																						"rt": string,
																						"rw": string,
																						"id_desa": string,
																						"id_kecamatan": string,
																						"id_kabupaten": string,
																						"id_provinsi": string,
																						"email": string,
																						"no_hp": string
																				}
																			</textarea><br>
																			Balikannya sebagai berikut (jika berhasil/ atau terdaftar di sistem),<br><br>
																			<textarea class='form-control' rows='15' readonly>
																				{
																						"user_id": int,
																						"nik": string,
																						"nama": string,
																						"alamat": string,
																						"rt": string,
																						"rw": string,
																						"id_desa": string,
																						"id_kecamatan": string,
																						"id_kabupaten": string,
																						"id_provinsi": string,
																						"email": string,
																						"no_hp": string,
																						"foto": {url}
																				}
																			</textarea>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_23" aria-expanded="false"> <span class="label label-primary"> POST </span>&nbsp;&nbsp;{URL}/api/auth/Reset_password</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_23" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/auth/Reset_password<br>
                                                                            <b>Method</b> : POST<br>
                                                                            <b>Deskripsi</b> : Mengatur ulang kata sandi dari akun pengguna tertentu<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Berikut parameter yang harus diisi,<br><br>
                                                                            <textarea class='form-control' rows='3' readonly>
                                                                            {
                                                                                    "email": string
                                                                            }
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
										</div>
										<div class="tab-pane" id="portlet_tab2_2">
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Provinsi</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Provinsi<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan semua data Provinsi<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='6' readonly>
                                                                            [
                                                                                    {
                                                                                            "id_provinsi": int,
                                                                                            "nm_provinsi": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Provinsi?id_provinsi={id_provinsi}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Provinsi?id_provinsi={id_provinsi}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan satu data Provinsi yang dipilih<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='4' readonly>
                                                                            {
                                                                                    "id_provinsi": int,
                                                                                    "nm_provinsi": string
                                                                            }
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_5" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Kabupaten</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Kabupaten<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan semua data Kabupaten/ Kota<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='7' readonly>
                                                                            [
                                                                                    {
                                                                                            "id_kabupaten": int,
                                                                                            "id_provinsi": int,
                                                                                            "nm_kabupaten": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_6" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Kabupaten?id_kabupaten={id_kabupaten}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_6" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Kabupaten?id_kabupaten={id_kabupaten}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan satu data Kabupaten/ Kota yang dipilih<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='5' readonly>
                                                                            {
                                                                                    "id_kabupaten": int,
                                                                                    "id_provinsi": string,
                                                                                    "nm_kabupaten": string
                                                                            }
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_7" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Kabupaten?id_provinsi={id_provinsi}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_7" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Kabupaten?id_provinsi={id_provinsi}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan data Kabupaten/ Kota berdasarkan Provinsi tertentu<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='7' readonly>
                                                                            [
                                                                                    {
                                                                                            "id_kabupaten": int,
                                                                                            "id_provinsi": int,
                                                                                            "nm_kabupaten": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_8" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Kecamatan</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_8" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Kecamatan<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan semua data Kecamatan<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='8' readonly>
                                                                            [
                                                                                    {
                                                                                            "id_kecamatan": int,
                                                                                            "nm_kecamatan": string,
                                                                                            "nm_kabupaten": string,
                                                                                            "nm_provinsi": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_9" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Kecamatan?id_kecamatan={id_kecamatan}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_9" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Kecamatan?id_kecamatan={id_kecamatan}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan satu data Kecamatan yang dipilih<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='6' readonly>
                                                                            {
                                                                                    "id_kecamatan": int,
                                                                                    "nm_kecamatan": string,
                                                                                    "nm_kabupaten": string,
                                                                                    "nm_provinsi": string
                                                                            }
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_10" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Kecamatan?id_provinsi={id_provinsi}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_10" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Kecamatan?id_provinsi={id_provinsi}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan data Kecamatan berdasarkan Provinsi tertentu<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='8' readonly>
                                                                            [
                                                                                    {
                                                                                            "id_kecamatan": int,
                                                                                            "nm_kecamatan": string,
                                                                                            "nm_kabupaten": string,
                                                                                            "nm_provinsi": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_11" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Kecamatan?id_kabupaten={id_kabupaten}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_11" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Kecamatan?id_kabupaten={id_kabupaten}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan data Kecamatan berdasarkan Kabupaten/ Kota tertentu<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='8' readonly>
                                                                            [
                                                                                    {
                                                                                            "id_kecamatan": int,
                                                                                            "nm_kecamatan": string,
                                                                                            "nm_kabupaten": string,
                                                                                            "nm_provinsi": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_12" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Desa</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_12" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Desa<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan semua data Kelurahan/ Desa<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='9' readonly>
                                                                            [
                                                                                    {
                                                                                            "id_desa": int,
                                                                                            "nm_desa": string,
                                                                                            "nm_kecamatan": string,
                                                                                            "nm_kabupaten": string,
                                                                                            "nm_provinsi": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_13" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Desa?id_desa={id_desa}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_13" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Desa?id_desa={id_desa}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan satu data Kelurahan/ Desa yang dipilih<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='7' readonly>
                                                                            {
                                                                                "id_desa": int,
                                                                                "nm_desa": string,
                                                                                "nm_kecamatan": string,
                                                                                "nm_kabupaten": string,
                                                                                "nm_provinsi": string
                                                                            }
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_14" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Desa?id_provinsi={id_provinsi}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_14" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Desa?id_provinsi={id_provinsi}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan data Kelurahan/ Desa berdasarkan Provinsi tertentu<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='9' readonly>
                                                                            [
                                                                                    {
                                                                                        "id_desa": int,
                                                                                        "nm_desa": string,
                                                                                        "nm_kecamatan": string,
                                                                                        "nm_kabupaten": string,
                                                                                        "nm_provinsi": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_15" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Desa?id_kabupaten={id_kabupaten}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_15" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Desa?id_kabupaten={id_kabupaten}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan data Kelurahan/ Desa berdasarkan Kabupaten/ Kota tertentu<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='9' readonly>
                                                                            [
                                                                                    {
                                                                                        "id_desa": int,
                                                                                        "nm_desa": string,
                                                                                        "nm_kecamatan": string,
                                                                                        "nm_kabupaten": string,
                                                                                        "nm_provinsi": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
                                            <!-- Awal -->
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_16" aria-expanded="false"> <span class="label label-success"> GET </span>&nbsp;&nbsp;{URL}/api/master/Desa?id_kecamatan={id_kecamatan}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_16" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="portlet light ">
                                                                        <div class="portlet-title">
                                                                            <b>URL</b> : https://seafoodau.eaoron.co.id/api/master/Desa?id_kecamatan={id_kecamatan}<br>
                                                                            <b>Method</b> : GET<br>
                                                                            <b>Deskripsi</b> : Mendapatkan data Kelurahan/ Desa berdasarkan Kecamatan tertentu<br><br>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            Balikannya sebagai berikut,<br><br>
                                                                            <textarea class='form-control' rows='9' readonly>
                                                                            [
                                                                                    {
                                                                                        "id_desa": int,
                                                                                        "nm_desa": string,
                                                                                        "nm_kecamatan": string,
                                                                                        "nm_kabupaten": string,
                                                                                        "nm_provinsi": string
                                                                                    }
                                                                            ]
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir -->
										</div>
										<div class="tab-pane" id="portlet_tab2_3">
											Data masih kosong
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-footer">
            <div class="container"> 2020 &copy;
            </div>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        <script src="<?= base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      
        <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?= base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?= base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>