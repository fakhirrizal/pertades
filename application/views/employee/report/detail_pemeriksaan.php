<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-text">
            <h3>Catatan</h3>
        </div>
    </div>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-file-2"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Detail Data Pemeriksaan
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="dropdown dropdown-inline">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-xl-4">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Data Fisioterapi
                                </h3>
                            </div>
                        </div>
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body">
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Nama:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->fisioterapi; ?></span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Alamat:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->alamat_fisioterapi; ?></span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Nomor HP:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->nomor_hp_fisioterapi; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Data Pasien
                                </h3>
                            </div>
                        </div>
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body">
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Nomor Pasien:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->nomor_pasien; ?></span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Nama:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->pasien; ?></span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Jenis Kelamin:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->jenis_kelamin; ?></span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Alamat:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->alamat_pasien; ?></span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Nomor HP:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->nomor_hp_pasien; ?></span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Tanggal Lahir:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?php if($data_utama->tanggal_lahir==NULL OR $data_utama->tanggal_lahir=='' OR $data_utama->tanggal_lahir=='0000-00-00'){echo'';}else{echo $this->Main_model->convert_tanggal($data_utama->tanggal_lahir);} ?></span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-4 col-form-label">Nama Wali:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext kt-font-bolder"><?= $data_utama->nama_wali; ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            if($data_utama->jumlah_periksa=='1'){
                                echo'';
                            }else{
                            ?>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions kt-space-between">
                                    <a href="<?= base_url().'employee_side/detail_data_pasien/'.md5($data_utama->id_pasien); ?>" class="btn btn-label-brand btn-sm btn-bold"><i class="la la-share"></i> Riwayat Pasien</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">

                    <div class="kt-portlet kt-portlet--tabs">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-toolbar">
                                <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_2" role="tab">
                                            <i class="flaticon2-time"></i> Data Pemeriksaan
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="tab-content kt-margin-t-20">
                                <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                    <div class="kt-notification">
                                        <a href="javascript:void(0)" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                    </g>
                                                </svg> </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Tanggal pemeriksaan: <?= $this->Main_model->convert_datetime($data_utama->created_at); ?>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                    </g>
                                                </svg> </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Diagnosa/ Condition:
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                        foreach ($diagnosa as $key => $value) {
                                            echo'
                                            <a href="javascript:void(0)" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        <b>-</b> '.$value->diagnosa.'
                                                    </div>
                                                </div>
                                            </a>
                                            ';
                                        }
                                        ?>
                                        <a href="javascript:void(0)" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                    </g>
                                                </svg> </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Body function and body structure:
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                        foreach ($body_function_and_body_structure as $key => $value) {
                                            echo'
                                            <a href="javascript:void(0)" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        <b>-</b> '.$value->body_function_and_body_structure.'
                                                    </div>
                                                </div>
                                            </a>
                                            ';
                                        }
                                        ?>
                                        <a href="javascript:void(0)" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                    </g>
                                                </svg> </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Activities (activity limitation):
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                        foreach ($activities as $key => $value) {
                                            echo'
                                            <a href="javascript:void(0)" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        <b>-</b> '.$value->activities.'
                                                    </div>
                                                </div>
                                            </a>
                                            ';
                                        }
                                        ?>
                                        <a href="javascript:void(0)" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                    </g>
                                                </svg> </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Participation restriction:
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                        foreach ($participation_restriction as $key => $value) {
                                            echo'
                                            <a href="javascript:void(0)" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        <b>-</b> '.$value->participation_restriction.'
                                                    </div>
                                                </div>
                                            </a>
                                            ';
                                        }
                                        ?>
                                        <a href="javascript:void(0)" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                    </g>
                                                </svg> </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Enviromental factors: <?= $data_utama->enviromental_factors; ?>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                    </g>
                                                </svg> </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Personal factors: <?= $data_utama->personal_factors; ?>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                    </g>
                                                </svg> </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Catatan: <?= $data_utama->catatan; ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>