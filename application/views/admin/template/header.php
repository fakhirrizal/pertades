<?php
if(($this->session->userdata('id'))==NULL){
	echo "<script>alert('Harap login terlebih dahulu')</script>";
	echo "<script>window.location='".base_url('Auth/logout')."'</script>";
}else{
	if($this->session->userdata('role_id')=='1'){
        echo'';
        $get_data_profile = $this->Main_model->getSelectedData('user a', 'a.*', array('a.id'=>$this->session->userdata('id')))->row();
	}else{
		echo "<script>alert('Harap login terlebih dahulu')</script>";
		echo "<script>window.location='".base_url('Auth/logout')."'</script>";
	}
}
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sistem Informasi</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?= base_url(); ?>assets/favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/c3/c3.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/theme.min.css">
        <style media="all" type="text/css">
            .alignCenter { text-align: center; }
        </style>
		<script src="<?= base_url(); ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                                </div>
                            </div>
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <!-- <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                                <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                    <h4 class="header">Notifications</h4>
                                    <div class="notifications-wrap">
                                        <a href="javascript:void(0)" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">Invitation accepted</span> 
                                                <span class="media-content">Your have been Invited ...</span>
                                            </span>
                                        </a>
                                        <a href="javascript:void(0)" class="media">
                                            <span class="d-flex">
                                                <img src="<?= base_url(); ?>assets/img/users/1.jpg" class="rounded-circle" alt="">
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">Steve Smith</span> 
                                                <span class="media-content">I slowly updated projects</span>
                                            </span>
                                        </a>
                                        <a href="javascript:void(0)" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-calendar"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">To Do</span> 
                                                <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                                <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Message"><i class="ik ik-mail"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Accounts"><i class="ik ik-users"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Sales"><i class="ik ik-shopping-cart"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Purchase"><i class="ik ik-briefcase"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Pages"><i class="ik ik-clipboard"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Chats"><i class="ik ik-message-square"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Contacts"><i class="ik ik-map-pin"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Blocks"><i class="ik ik-inbox"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Events"><i class="ik ik-calendar"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Notifications"><i class="ik ik-bell"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="More"><i class="ik ik-more-horizontal"></i></a>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button> -->
                            <?= $get_data_profile->fullname; ?>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0)" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    $name_file = '';
                                    if($get_data_profile->photo=='' OR $get_data_profile->photo==NULL){
                                        $name_file = 'data_upload/photo_profile/no-image.png';
                                    }else{
                                        $name_file = 'data_upload/photo_profile/'.$get_data_profile->photo;
                                    }
                                    ?>
                                    <img class="avatar" src="<?= base_url().$name_file; ?>" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?= base_url(); ?>admin_side/profil"><i class="ik ik-user dropdown-icon"></i> Profil</a>
                                    <a class="dropdown-item" href="<?= base_url(); ?>admin_side/bantuan"><i class="ik ik-alert-octagon dropdown-icon"></i> Bantuan</a>
                                    <a class="dropdown-item" href="<?= base_url(); ?>Auth/logout"><i class="ik ik-power dropdown-icon"></i> Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="<?= base_url(); ?>admin_side/beranda">
                            <div class="logo-img">
                               <img src="<?= base_url(); ?>assets/src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> 
                            </div>
                            <span class="text">ThemeKit</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
								<div class="nav-lavel">Menu Utama</div>
                                <div class="nav-item <?php if($parent=='home'){echo 'active';}else{echo '';} ?>">
                                    <a href="<?= base_url(); ?>admin_side/beranda"><i class="ik ik-home"></i><span>Beranda</span></a>
                                </div>
                                <div class="nav-item has-sub <?php if($parent=='master'){echo 'active open';}else{echo '';} ?>">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Master</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= base_url(); ?>admin_side/regional" class="menu-item <?php if($child=='regional'){echo 'active';}else{echo '';} ?>">Regional</a>
                                        <a href="<?= base_url(); ?>admin_side/data_pengguna" class="menu-item <?php if($child=='user'){echo 'active';}else{echo '';} ?>">Pengguna</a>
                                        <a href="<?= base_url(); ?>admin_side/persentase" class="menu-item <?php if($child=='percentage'){echo 'active';}else{echo '';} ?>">Persentase Hasil</a>
                                        <a href="<?= base_url(); ?>admin_side/data_spbu" class="menu-item <?php if($child=='tool'){echo 'active';}else{echo '';} ?>">SPBU</a>
                                    </div>
								</div>
                                <div class="nav-item has-sub <?php if($parent=='transaction'){echo 'active open';}else{echo '';} ?>">
                                    <a href="javascript:void(0)"><i class="ik ik-shopping-cart"></i><span>Transaksi</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= base_url(); ?>admin_side/data_pembelian" class="menu-item <?php if($child=='purchasing'){echo 'active';}else{echo '';} ?>">Pembelian</a>
                                        <a href="<?= base_url(); ?>admin_side/data_penjualan" class="menu-item <?php if($child=='selling'){echo 'active';}else{echo '';} ?>">Penjualan</a>
                                        <a href="<?= base_url(); ?>admin_side/rekap_data" class="menu-item <?php if($child=='report'){echo 'active';}else{echo '';} ?>">Rekap Laporan</a>
                                    </div>
                                </div>
                                <div class="nav-item <?php if($parent=='accountancy'){echo 'active';}else{echo '';} ?>">
                                    <a href="<?= base_url().'admin_side/pembukuan'; ?>"><i class="ik ik-book"></i><span>Pembukuan</span></a>
                                </div>
                                <div class="nav-item <?php if($parent=='log_activity'){echo 'active';}else{echo '';} ?>">
                                    <a href="<?= base_url().'admin_side/log_aktifitas'; ?>"><i class="ik ik-monitor"></i><span>Log Aktifitas</span></a>
                                </div>
                                <div class="nav-item <?php if($parent=='about'){echo 'active';}else{echo '';} ?>">
                                    <a href="<?= base_url().'admin_side/tentang_aplikasi'; ?>"><i class="ik ik-help-circle"></i><span>Tentang Aplikasi</span></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                    	<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-square bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Selamat Datang di Sistem Informasi Manajemen</h5>
                                            <span>Jika ada kendala silahkan hubungi 0856 9630 3627</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a><i class="ik ik-home"></i> <?= $breadcrumbs1; ?></a>
											</li>
											<?php
											if($breadcrumbs2==NULL OR $breadcrumbs2==''){
												echo'';
											}else{
												echo'
												<li class="breadcrumb-item">
													<a>'.$breadcrumbs2.'</a>
												</li>
												';
											}
											if($breadcrumbs3==NULL OR $breadcrumbs3==''){
												echo'';
											}else{
												echo'
												<li class="breadcrumb-item">
													<a>'.$breadcrumbs3.'</a>
												</li>
												';
											}
											?>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
						</div>