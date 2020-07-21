<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
<style type="text/css">
    .pesan {display:block; font-size:small; margin-top:5px;}
    .error {color:red; }
    .fa {cursor: pointer; }
    .input {width: 350px; height: 35px; margin: 10px 0 0 0;}
    .active, input[type='text'] {width: 350px;height: 35px;margin: 10px 0 0 0;}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<style>
    #message {
        display:none;
    }
    .valid {
        color: green;
    }
    .invalid {
        color: red;
    }
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
            <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
            </button>
            <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                <div class="kt-portlet ">
                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                        <div class="kt-widget kt-widget--user-profile-1">
                            <div class="kt-widget__body">
                                <div class="kt-widget__content">
                                </div>
                                <div class="kt-widget__items">
                                    <a href="<?php echo site_url('admin_side/profil'); ?>" class="kt-widget__item ">
                                        <span class="kt-widget__section">
                                            <span class="kt-widget__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg> </span>
                                            <span class="kt-widget__desc">
                                                Personal Information
                                            </span>
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" class="kt-widget__item kt-widget__item--active">
                                        <span class="kt-widget__section">
                                            <span class="kt-widget__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg> </span>
                                            <span class="kt-widget__desc">
                                                Change Password
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">Change Password<small>change or reset your account password</small></h3>
                                </div>
                                <div class="kt-portlet__head-toolbar kt-hidden">
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-sellsy"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__section kt-nav__section--first">
                                                        <span class="kt-nav__section-text">Quick Actions</span>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="javascript:void(0)" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                                            <span class="kt-nav__link-text">Statistics</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="javascript:void(0)" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                                            <span class="kt-nav__link-text">Events</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="javascript:void(0)" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                                            <span class="kt-nav__link-text">Reports</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="javascript:void(0)" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-bell-1o"></i>
                                                            <span class="kt-nav__link-text">Notifications</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="javascript:void(0)" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                                            <span class="kt-nav__link-text">Files</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right" id='frm' action="<?=base_url('admin_side/perbarui_kata_sandi');?>" method="post" enctype='multipart/form-data'>
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">Change Or Recover Your Password:</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control" value="" name='old' placeholder="Current password" required>
                                                    <a href="javascript:void(0)" class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">Forgot password ?</a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label pesan">New Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control input" id='pass1' name='p1' placeholder="New password" required>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label for="pass2" class="col-xl-3 col-lg-3 col-form-label pesan">Verify Password  <i id="icon" class="fa fa-eye-slash"></i></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control input" id='pswd2' name='pass2' value="" placeholder="Verify password">
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div id="message">
                                                        <br>
                                                        <br>
                                                        <h5>Password harus terdiri dari: </h5>
                                                        <p id="letter" class="invalid">Memiliki <b>huruf kecil</b></p>
                                                        <p id="capital" class="invalid">Memiliki <b>huruf besar</b></p>
                                                        <p id="number" class="invalid">Memiliki <b>nomor</b></p>
                                                        <p id="length" class="invalid">Minimal <b>8 karakter</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-3 col-xl-3">
                                            </div>
                                            <div class="col-lg-9 col-xl-9">
                                                <button type="submit" class="btn btn-brand btn-bold">Change Password</button>&nbsp;
                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
      $('#frm').validate({
        rules: {
            pass2: {
                equalTo: "#pass1"
            }
        },
        messages: {
            pass2: {
                equalTo: "<p>Password yang Anda Masukan Tidak Sama</p>"
            }
        }
      });
    });
    var input = document.getElementById('pswd2'),
        icon = document.getElementById('icon');
        icon.onclick = function () {
            if(input.className == 'active') {
                input.setAttribute('type', 'text');
                icon.className = 'fa fa-eye';
                input.className = '';
            } else {
                input.setAttribute('type', 'password');
                icon.className = 'fa fa-eye-slash';
                input.className = 'active';
            }
        }
</script>