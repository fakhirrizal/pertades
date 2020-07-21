<?php
if(($this->session->userdata('id'))==NULL){
	echo "<script>alert('Harap login terlebih dahulu')</script>";
	echo "<script>window.location='".base_url('Auth/logout')."'</script>";
}else{
	if($this->session->userdata('role_id')=='2'){
		echo'';
	}else{
		echo "<script>alert('Harap login terlebih dahulu')</script>";
		echo "<script>window.location='".base_url('Auth/logout')."'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="../../">
		<meta charset="utf-8" />
		<title>Sistem Informasi</title>
		<meta name="description" content="Actions subheader example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

		<link href="<?= base_url(); ?>assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

		<link href="<?= base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<link href="<?= base_url(); ?>assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet" type="text/css" />

		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

		<link rel="shortcut icon" href="<?= base_url(); ?>assets/icon.JPG" />
	</head>
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="<?= base_url(); ?>">
					<img alt="Logo" src="<?= base_url(); ?>assets/media/logos/logo-12.png" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="<?= base_url(); ?>">
								<img alt="Logo" src="<?= base_url(); ?>assets/media/logos/logo-12.png">
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
						</div>
					</div>
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<ul class="kt-menu__nav ">
								<li class="kt-menu__item <?php if($parent=='home'){echo 'kt-menu__item--active';}else{echo '';} ?>" aria-haspopup="true"><a href="<?= base_url().'employee_side/beranda'; ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Beranda</span></a></li>
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">Menu Utama</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
								<li class="kt-menu__item <?php if($parent=='master'){echo 'kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here';}else{echo 'kt-menu__item--submenu';} ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-box-1"></i><span class="kt-menu__link-text">Master</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item <?php if($child=='master_fisioterapi'){echo 'kt-menu__item--active';}else{echo '';} ?>" aria-haspopup="true"><a href="<?= base_url().'employee_side/data_fisioterapi'; ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Fisioterapi</span></a></li>
											<li class="kt-menu__item <?php if($child=='master_pasien'){echo 'kt-menu__item--active';}else{echo '';} ?>" aria-haspopup="true"><a href="<?= base_url().'employee_side/data_pasien'; ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pasien</span></a></li>
										</ul>
									</div>
								</li>
								<li class="kt-menu__item <?php if($parent=='pemeriksaan'){echo 'kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here';}else{echo 'kt-menu__item--submenu';} ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-doc"></i><span class="kt-menu__link-text">Pemeriksaan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item <?php if($child=='pemeriksaan'){echo 'kt-menu__item--active';}else{echo '';} ?>" aria-haspopup="true"><a href="<?= base_url().'employee_side/pemeriksaan'; ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pemeriksaan</span></a></li>
											<li class="kt-menu__item <?php if($child=='hasil_pemeriksaan'){echo 'kt-menu__item--active';}else{echo '';} ?>" aria-haspopup="true"><a href="<?= base_url().'employee_side/hasil_pemeriksaan'; ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Hasil Pemeriksaan</span></a></li>
											<li class="kt-menu__item <?php if($child=='rekap_pemeriksaan'){echo 'kt-menu__item--active';}else{echo '';} ?>" aria-haspopup="true"><a href="<?= base_url().'employee_side/rekap_pemeriksaan'; ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Rekap Pemeriksaan</span></a></li>
										</ul>
									</div>
								</li>
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">Aplikasi</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
								<li class="kt-menu__item <?php if($parent=='log_activity'){echo 'kt-menu__item--active';}else{echo '';} ?>" aria-haspopup="true"><a href="<?= base_url().'employee_side/log_aktifitas'; ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-layers"></i><span class="kt-menu__link-text">Log Aktifitas</span></a></li>
								<li class="kt-menu__item <?php if($parent=='about'){echo 'kt-menu__item--active';}else{echo '';} ?>" aria-haspopup="true"><a href="<?= base_url().'employee_side/tentang_aplikasi'; ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Tentang Aplikasi</span></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
						</div>
						<div class="kt-header__topbar">
							<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<i class="flaticon2-search-1"></i>
									</span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
									<div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
										<form method="get" class="kt-quick-search__form">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
												<input type="text" class="form-control kt-quick-search__input" placeholder="Cari...">
												<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
											</div>
										</form>
										<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200">
										</div>
									</div>
								</div>
							</div>
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<?php
										$get_data_user = $this->Main_model->getSelectedData('user a', 'a.*', array('id'=>$this->session->userdata('id')))->row();
										$foto = base_url().'assets/media/users/300_20.jpg';
										if($get_data_user->photo=='' OR $get_data_user->photo==NULL){
											echo'';
										}else{
											$foto = base_url().'data_upload/photo_profile/'.$get_data_user->photo;
										}
										?>
										<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
										<span class="kt-header__topbar-username kt-hidden-mobile"><?= $get_data_user->fullname; ?></span>
										<img alt="Pic" class="kt-radius-100" src="<?= $foto; ?>" />
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
									<div class="kt-notification">
										<a href="<?= base_url().'employee_side/profil'; ?>" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-calendar-3 kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Profil Saya
												</div>
											</div>
										</a>
										<a href="<?= base_url().'employee_side/bantuan'; ?>" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-rocket-1 kt-font-danger"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Bantuan
												</div>
											</div>
										</a>
										<div class="kt-notification__custom kt-space-between">
											<a href="<?= base_url().'Auth/logout'; ?>" class="btn btn-label btn-label-brand btn-sm btn-bold">Keluar</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<div class="kt-subheader__breadcrumbs">
										<a href="" class="kt-subheader__breadcrumbs-link">
											<?= $breadcrumbs1; ?> </a>
										<?php
										if($breadcrumbs2==NULL OR $breadcrumbs2==''){
											echo'';
										}else{
											echo'
											<span class="kt-subheader__breadcrumbs-separator"></span>
											<a href="" class="kt-subheader__breadcrumbs-link">
												'.$breadcrumbs2.' </a>
											';
										}
										if($breadcrumbs3==NULL OR $breadcrumbs3==''){
											echo'';
										}else{
											echo'
											<span class="kt-subheader__breadcrumbs-separator"></span>
											<a href="" class="kt-subheader__breadcrumbs-link">
												'.$breadcrumbs3.' </a>
											';
										}
										?>
									</div>
								</div>
								<div class="kt-subheader__toolbar">
									<div class="kt-subheader__wrapper">
										<script type="text/javascript">function startTime(){var today=new Date(),curr_hour=today.getHours(),curr_min=today.getMinutes(),curr_sec=today.getSeconds();curr_hour=checkTime(curr_hour);curr_min=checkTime(curr_min);curr_sec=checkTime(curr_sec);document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;}function checkTime(i){if(i<10){i="0"+i;}return i;}setInterval(startTime,500);</script>
										<a class="btn kt-subheader__btn-daterange" data-toggle="kt-tooltip" data-placement="left">
											<span class="kt-subheader__btn-daterange-date tanggalwaktu" ><?= $this->Main_model->convert_hari(date('Y-m-d')).', '.$this->Main_model->convert_tanggal(date('Y-m-d')) ?>  -  Pukul  <span id="clock">13:53:45</span></span>
											<i class="flaticon2-calendar-1"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<style media="all" type="text/css">
							.alignCenter { text-align: center; }
						</style>