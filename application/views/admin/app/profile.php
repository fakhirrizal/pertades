<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <?php
                    $name_file = '';
                    if($data_utama->photo=='' OR $data_utama->photo==NULL){
                        $name_file = 'data_upload/photo_profile/no-image.png';
                    }else{
                        $name_file = 'data_upload/photo_profile/'.$data_utama->photo;
                    }
                    ?>
                    <img src="<?= base_url().$name_file; ?>" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-10"><?= $data_utama->fullname; ?></h4>
                    <!-- <p class="card-subtitle">Front End Developer</p>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <!-- <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true"></a>
                </li>
            </ul> -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <form class="form-horizontal" action='<?= base_url().'admin_side/perbarui_profil'; ?>' method='post'>
                            <div class="form-group">
                                <label>Nama <font color='red'>*</font></label>
                                <input type="text" class="form-control" name="nama" value='<?= $data_utama->fullname; ?>' required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Foto Profil</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>